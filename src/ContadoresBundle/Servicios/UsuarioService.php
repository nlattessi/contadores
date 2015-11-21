<?php

namespace ContadoresBundle\Servicios;

use Doctrine\ORM\EntityManager;

class UsuarioService
{
    protected $em;
    private $idRolCliente;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
        $this->idRolCliente = '4';
    }

    public function obtenerPrestadoresActivos()
    {
        $prestadores = $this->em->getRepository('ContadoresBundle:Prestador')->findBy(array('activo' => true));

        return $prestadores;
    }

    public function obtenerPrestadorPorUsuario($usuario)
    {
        $usuarioPrestador = $this->em->getRepository('ContadoresBundle:UsuarioPrestador')->findOneBy(array('usuario' => $usuario));

        return $usuarioPrestador->getPrestador();
    }

    public function obtenerDocentesPorPrestador($prestador)
    {
        if ($prestador) {
            $docentes = $this->em->getRepository('ContadoresBundle:Docente')->findBy(array('prestador' => $prestador, 'activo' => true));
        } else {
          $docentes = null;
        }
        return $docentes;
    }

    public function obtenerSedesPorPrestador($prestador)
    {
        if ($prestador) {
            $sedes = $this->em->getRepository('ContadoresBundle:Sede')->findBy(array('prestador' => $prestador, 'activo' => true));
        } else {
          $sedes = null;
        }
        return $sedes;
    }

    public function obtenerUsuariosRolCliente()
    {
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Usuario')->createQueryBuilder('u')
            ->where('u.rol = ?1')
            ->setParameter(1, $this->idRolCliente );
       return $queryBuilder->getQuery()->getResult();
    }
}
