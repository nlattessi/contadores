<?php

namespace ContadoresBundle\Servicios;

use Doctrine\ORM\EntityManager;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ClienteService
{
    protected $em;
    protected $kernelCacheDir;
    protected $hashids;
    protected $router;
    static $idTipoCursoBasico = 1;

    public function __construct(EntityManager $entityManager, $kernelCacheDir, $hashids, $router)
    {
        $this->em = $entityManager;
        $this->kernelCacheDir = $kernelCacheDir;
        $this->hashids = $hashids;
        $this->router = $router;
    }

    public function getStatusPorDniCliente($dni)
    {
        $query = $this->em->createQueryBuilder()
            ->select(
                'cliente.id as clienteId', 'cliente.nombre', 'cliente.apellido', 'cliente.dni', 'cliente.tieneCursoBasico as tieneCursoBasico',
                'clienteCurso.id as clienteCursoId', 'clienteCurso.aprobado as aprobado','clienteCurso.pagado', 'clienteCurso.documentacion',
                'curso.id as cursoId', 'curso.fechaFin as fechaFin'
            )
            ->from('ContadoresBundle:Cliente', 'cliente')
            ->leftJoin(
                'ContadoresBundle:ClienteCurso', 'clienteCurso',
                \Doctrine\ORM\Query\Expr\Join::WITH, 'clienteCurso.cliente = cliente.id'
            )
            ->leftJoin(
                'ContadoresBundle:Curso', 'curso',
                \Doctrine\ORM\Query\Expr\Join::WITH, 'clienteCurso.curso = curso.id'
            )
            ->where('cliente.dni = :dni')
            ->andWhere('curso.tipocurso != :idTipoCursoBasico')
            ->orderBy('curso.fechaFin', 'DESC')
            ->setParameter('dni', $dni)
            ->setParameter('idTipoCursoBasico', ClienteService::$idTipoCursoBasico)
            ->setMaxResults(1)
            ->getQuery();

        $result = $query->getResult();
        /*print json_encode($result);
        exit;*/

        if ($result) {
            $result = $result[0];
            $result['certificado'] = false;
            if ($result['tieneCursoBasico']) {
                if ($result['clienteCursoId'] && $result['fechaFin'] > new \DateTime('-1 year')) {
                    if ($result['aprobado'] > 3) {
                        if ($result['pagado']) {
                            if ($result['documentacion']) {
                                $result['certificado'] = true;
                                $result['message'] = "Puede descargar el certificado para este cliente.";
                            } else {
                                $result['message'] = "No se cargo en sistema la documentación correspondiente.";
                            }
                        } else {
                            $result['message'] = 'No figura pago el ultimo curso complementario.';
                        }
                    } else {
                        $result['message'] = 'No tiene aprobado el ultimo curso complementario.';
                    }
                } else {
                    $result['message'] = 'No tiene el curso complementario o la vigencia del mismo ya expiro.';
                }
            } else {
                $result['message'] = 'No tiene el curso basico.';
            }
        }

        return $result;
    }

    public function descargarCertificado($dni)
    {
        $cliente = $this->em->getRepository('ContadoresBundle:Cliente')->findOneBy(['dni' => $dni]);

        if(!$cliente){
            //no Existe el cliente
            return null;
        }

        $status = $this->getStatusPorDniCliente($cliente->getDni());

        if(count($status) < 1){
            //No existen certificados
            return null;
        }
        if(!$status['certificado']){
            //Por algún motivo no está listo para ser impreso, falta pago, falta documentación
            return null;
        }
        $curso = $this->em->getRepository('ContadoresBundle:Curso')->find($status['cursoId']);

        $url = $this->router->generate('contadores_descargar_certificados_hash', [
            'hash' => $this->hashids->encode($cliente->getId())
        ]);
        $url = "http://$_SERVER[HTTP_HOST]" . $url;

        $data = [
            'id' => $cliente->getId(),
            'prestador' => $curso->getPrestador()->getNombre(),
            'cliente' => $cliente->getNombre() . ' ' . $cliente->getApellido(),
            'matricula' => $cliente->getMatricula(),
            'dni' => $cliente->getDni(),
            'curso' => $curso->getTipocurso(),
            'sede' => $curso->getSede(),
            'fecha_curso' => $status['fechaFin']->format('d/m/Y'),
            'transaccion' => $curso->getComprobante(),
            'fecha_transaccion' => $curso->getFechaPago()->format('d/m/Y'),
            'url' => $url
        ];

        $pdfHtml  = new \PdfHtml();
        $pdf = $pdfHtml->crear_certificado($data, $this->kernelCacheDir);

        $filename = 'certificado' . $dni . '.pdf';
        $filepath =  $this->kernelCacheDir . '/' . $filename;

        $pdfFile = $pdf->Output($filepath, 'F');

        $fs = new FileSystem();
        if (!$fs->exists($filepath)) {
            throw $this->createNotFoundException();
        }

        $response = new \Symfony\Component\HttpFoundation\BinaryFileResponse($filepath);
        $response->headers->set('Content-Type', 'application/pdf');
        $d = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $filename
        );
        $response->headers->set('Content-Disposition', $d);

        return $response;
    }
}
