(function(window, document, $) {
var $esquema = $('#esquema');
    $esquema.change(function() {
    var $form = $('#formajax');
    var data = {};
    data[$esquema.attr('name')] = $esquema.val();
    data['busqPeriodo'] = true;
    $.ajax({
        url : $form.attr('action'),
        type: $form.attr('method'),
        data : data,
        dataType: 'json',
        success : function(res) {
            var $periodo = $('#periodo');
            $periodo.empty();
            $periodo.append('<option value="">-- Seleccione un período --</option>');
            //var $newEvaluacionData = $(html).find('#fevaluacion option');
            res.forEach(function(item){
                $periodo.append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });
        }
    });


});
    var $area = $('#area');
    $area.change(function() {
        var $form = $('#formajax');
        var data = {};
        data[$area.attr('name')] = $area.val();
        data['busqRubro'] = true;
        $.ajax({
            url : $form.attr('action'),
            type: $form.attr('method'),
            data : data,
            dataType: 'json',
            success : function(res) {
                var $rubro = $('#rubro');
                $rubro.empty();
                $rubro.append('<option value="">-- Seleccione un rubro --</option>');
                //var $newEvaluacionData = $(html).find('#fevaluacion option');
                res.forEach(function(item){
                    $rubro.append('<option value="' + item.id + '">' + item.nombre + '</option>');
                });
            }
        });


    });

    var $rubro = $('#rubro');
    $rubro.change(function() {
        var $form = $('#formajax');
        var data = {};
        data[$rubro.attr('name')] = $rubro.val();
        data['busqMetadata'] = true;
        $.ajax({
            url : $form.attr('action'),
            type: $form.attr('method'),
            data : data,
            dataType: 'json',
            success : function(res) {
                var $metadata = $('#metadata');
                $metadata.empty();
                $metadata.append('<option value="">-- Seleccione una tarea --</option>');
                //var $newEvaluacionData = $(html).find('#fevaluacion option');
                res.forEach(function(item){
                    $metadata.append('<option value="' + item.id + '">' + item.nombre + '</option>');
                });
            }
        });


    });



})(window, document, jQuery);