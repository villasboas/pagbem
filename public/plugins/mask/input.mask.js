function atualizaMascaraDocumento(me, target) {
    var mask = me.val() == 'F' ? '000.000.000-00' : '99.999.999/9999-99';
    
    // Adiciona a nova mascara
    target.unmask();
    target.mask(mask);
}


$(document).ready(function(){
    $('.date').mask('11/11/1111');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('0000-0000');
    $('.telefone').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('99.999.999/9999-99', {reverse: true});
    $('.valor').mask('000000000000000.00', {reverse: true});
    $('.total').mask('000000000000000.00', {reverse: true});
    atualizaMascaraDocumento($('.tipo_documento'), $('.documento'));
    $('.tipo_documento').on('change', function(){
        atualizaMascaraDocumento($(this), $('.documento'));
    })

    var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
      },
      options = {onKeyPress: function(val, e, field, options) {
              field.mask(maskBehavior.apply({}, arguments), options);
          }
      };
      
      $('.celular').mask(maskBehavior, options);

  });