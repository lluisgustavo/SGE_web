$(document).ready((function() {
    $('input[name=person_birthday]').mask('00/00/0000');
    $('input[name=person_cpf]').mask('000.000.000-00', {reverse: true});

    var MaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 9 ? '00000-0000' : '0000-00009';
        },
        Options = {
            onKeyPress: function (val, e, field, options) {
            field.mask(MaskBehavior.apply({}, arguments), options);
        }
    };

    $('.input[name=person_phone]').mask(MaskBehavior, Options);

    camposObrigatorios = function(campo){
        let elem = $('.ob');
        $.each(elem,function(i,v){
            if(campo == 1){
                $(v).attr('required',true);
            }else{
                $(v).attr('required',false);
            }
        })
    };
}));

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    $('input[name=address_street]').val("")
    $('input[name=address_district]').val("")
    $('input[name=address_city]').val("")
    $('input[name=address_state]').val("")
    $('input[name=address_country]').val("")
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    $('input[name=address_street]').val(conteudo.logradouro)
    $('input[name=address_district]').val(conteudo.bairro)
    $('input[name=address_city]').val(conteudo.localidade)
    $('input[name=address_state]').val(conteudo.uf)
    $('input[name=address_country]').val("Brasil")
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        $('input[name=address_street]').val("...")
        $('input[name=address_district]').val("...")
        $('input[name=address_city]').val("...")
        $('input[name=address_state]').val("...")
        $('input[name=address_country]').val("...")

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};