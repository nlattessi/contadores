(function(window, document, $) {

  // Dispara confirm ante click en 'Dar de baja'
  $("#darDeBaja").on("click",function(e) {
    e.stopPropagation();
    e.preventDefault();
    var $confirm = confirm('¿Se encuentra seguro de realizar la baja administrativa?');
    if ($confirm) {
      var $href = this.href;
      var $form = $('<form action="' + $href + '" method="post" id="formDarDeBaja">' + '</form>');
      $("body").append('<form action="' + $href + '" method="post" id="formDarDeBaja">' + '</form>');
      $("#formDarDeBaja").submit();
    }
  });

})(window, document, jQuery);
