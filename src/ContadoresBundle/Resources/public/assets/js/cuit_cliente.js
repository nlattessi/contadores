(function(window, document, $) {
  $("#contadoresbundle_cliente_cuit")
  .inputmask(
    "99-99999999-9",
    {
      "removeMaskOnSubmit": true,
      "clearMaskOnLostFocus": false,
    }
  );
  $("#contadoresbundle_clientefiltertype_cuit")
   .inputmask(
     "99-99999999-9",
     {
       "removeMaskOnSubmit": true,
       "clearMaskOnLostFocus": false,
     }
   );
})(window, document, jQuery);
