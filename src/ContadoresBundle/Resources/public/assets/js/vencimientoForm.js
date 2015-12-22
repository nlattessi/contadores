(function(window, document, $) {
  var $esquema = $('#contadoresbundle_vencimiento_esquema');
  $esquema.change(function() {
      var $form = $(this).closest('form');
      var data = {};
      data[$esquema.attr('name')] = $esquema.val();
      $.ajax({
        url : $form.attr('action'),
        type: $form.attr('method'),
        data : data,
        success : function(html) {
          var $periodo = $('#contadoresbundle_vencimiento_periodo');
          $periodo.empty();
          var $newPeriodoData = $(html).find('#contadoresbundle_vencimiento_periodo option');
          $newPeriodoData.each(function() {
            $periodo.append('<option value="' + $(this).val() + '">' + $(this).text() + '</option>');
          });
        }
      });
  });
})(window, document, jQuery);
