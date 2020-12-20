import { closeLoad, openLoad } from "./loading";

$(document).ready(function() {
    $('.cep-mask').mask('00000-000');

    $(document).on('keyup', '.cep-mask', function() {
        let cep = $(this).val();
        if(cep.length == 9) {
            $.ajax({
                type: "GET",
                url: 'https://viacep.com.br/ws/'+ cep +'/json/',
                crossDomain: true,
                beforeSend: function() {
                    openLoad();
                }
            }).done(function(dados) {
                closeLoad();
                if (!('erro' in dados)) {
                    $('#endereco').val(dados.logradouro);
                    $('#bairro').val(dados.bairro);
                    $('#cidade').val(dados.localidade);
                    $('#estado').val(dados.uf);
                } else {
                    $('.pedido-endereco, .pedido-bairro, .pedido-cidade, .pedido-estado, .frete-endereco, .frete-bairro, .frete-cidade, .frete-uf').val('');
                    console.log('CEP não encontrado!');
                }
            }).fail(function() {
                closeLoad();
                console.log('CEP não encontrado!');
            });
            $.ajaxSettings.headers["X-CSRF-TOKEN"] = $('meta[name="csrf-token"]').attr('content')
        }
    });
});
