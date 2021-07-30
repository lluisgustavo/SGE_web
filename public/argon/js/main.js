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


ValidaCPF = function(element){
    var Soma;
    var Resto;
    var CPF = $(element).val();
    CPF = CPF.replace(/\./g,'');
    CPF = CPF.replace(/-/g,'');
    Soma = 0;

    if (CPF == "00000000000" || CPF == "11111111111" || CPF == "22222222222" || CPF == "33333333333" ||
        CPF == "44444444444" || CPF == "55555555555" || CPF == "66666666666" || CPF == "77777777777" ||
        CPF == "88888888888" || CPF == "99999999999") {
        if($('.validaCPF')) $('.validaCPF').remove()
        $(element).after('<small class="validaCPF text-danger">CPF inválido<small>');
        return false;
    }

    for (i=1; i<=9; i++) Soma = Soma + parseInt(CPF.substring(i-1, i)) * (11 - i);

    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;

    if (Resto != parseInt(CPF.substring(9, 10)) ){
        if($('.validaCPF')) $('.validaCPF').remove()
        $(element).after('<small class="validaCPF position-absolute top-2 text-danger">CPF inválido<small>');
        return false;
    }
    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(CPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(CPF.substring(10, 11) ) ){
        if($('.validaCPF')) $('.validaCPF').remove()
        $(element).after('<small class="validaCPF text-danger">CPF inválido<small>');
        return false;
    }
    if($('.validaCPF')) $('.validaCPF').remove()
    return true;
}