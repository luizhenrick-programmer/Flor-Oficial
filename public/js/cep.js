function limpa_formulário_cep() {
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
    document.getElementById('cep').value = ("");
}

function formatarCEP(input) {
    let cep = input.replace(/\D/g, ''); // Atualizado para funcionar com strings
    if (cep.length > 8) cep = cep.slice(0, 8);
    cep = cep.replace(/^(\d{2})(\d)/, '$1.$2');
    cep = cep.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2-$3');
    return cep; // Agora retorna o CEP formatado
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementById('rua').value = conteudo.logradouro;
        document.getElementById('bairro').value = conteudo.bairro;
        document.getElementById('cidade').value = conteudo.localidade;
        document.getElementById('uf').value = conteudo.uf;

        // Formata o CEP encontrado
        const inputCep = document.getElementById('cep');
        inputCep.value = formatarCEP(inputCep.value);
    } else {
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    var cep = valor.replace(/\D/g, '');

    if (cep != "") {
        var validacep = /^[0-9]{8}$/;

        if (validacep.test(cep)) {
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";

            var script = document.createElement('script');
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
            document.body.appendChild(script);
        } else {
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } else {
        limpa_formulário_cep();
    }
};
