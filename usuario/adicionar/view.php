<?php 
    include "../../config/header/header.php";

?>

<div class="card my-2">
    <div class="card-body">
        <a href="/php/usuario" class="btn btn-primary">Voltar</a>
    </div>
</div>

<!-- ALERTAS -->

<?php if ($sucesso): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $msg ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
<?php endif; ?>

<?php if ($erro): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $msg ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- CORPO DA PAGINA -->

<div class="card my-2" style="width: full;">
  
    <div class="card-body">
        <h3 class="card-title">Cadastro de Usúário</h3>
        <form method="post" action="#" name="regUsuario" enctype="multipart/form-data"> 
        <div class="row p-2" >
            <div class="col-6">
                <h6>Nome: </h6>
                <input id="nome" name="nome" type="text" class="form-control" placeholder="Nome" aria-label="Nome" required>
            </div>
            <div class="col-3">
                <h6>Instituicao: </h6>
                <select class="form-control" name="instituicao" id="instituicao">
                    <?php while($instituicao = $busca_instituicao->fetch_object()) { ?>
                        <option value="<?= $instituicao->id?> "> <?=$instituicao->descricao?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-3">
                <h6>Tipo: </h6>
                <select class="form-control" name="tipo" id="tipo">
                <?php while($tipo = $busca_tipo->fetch_object()) { ?>
                        <option value="<?= $tipo->id?> "> <?=$tipo->descricao?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-6">
                <h6>Senha: </h6>
                <input id="senha" onkeyup="validaSenha()" name="senha" type="password" class="form-control" placeholder="Senha (mínimo 8 caracteres)" aria-label="Senha">
                <span class="p-1 validacao" id="msg_senha"></span>
            </div>
            <div class="col-6">
                <h6>Confirme sua senha: </h6>
                <input id="confirma-senha" onkeyup="validaConfirmaSenha()" name="confirma-senha" type="password" class="form-control" placeholder="Confirme sua senha">
                <span class="p-1 validacao" id="msg_confirma_senha"></span>
            </div>
        </div>
        <br>
        <div class="row p-2" >
            <div class="col-6">
                <h6>CPF: </h6>
                <input id="cpf" onkeyup="msgCpf()" name="cpf" type="text" class="form-control" placeholder="CPF XXX.XXX.XXX-XX" aria-label="CPF">
                <span class="p-1 validacao" id="msg_cpf"></span>
            </div>
                
            <div class="col-6">
                <h6>CNPJ: </h6>
                <input id="cnpj" onkeyup="msgCnpj()" name="cnpj" type="text" class="form-control" placeholder="CNPJ" aria-label="CNPJ">
                <span class="p-1 validacao" id="msg_cnpj"></span>
            </div>
        </div>
        <br>
        <div class="row p-2" >
            <div class="col-6">
                <h6>E-mail: </h6>
                <input id="email" onkeyup="msgEmail()" name="email" type="text" class="form-control" placeholder="E-mail" aria-label="E-mail">
                <span class="p-1 validacao" id="msg_email"></span>
            </div>
        
            <div class="col-6">
                <h6>Telefone: </h6>
                <input id="tel1" onkeyup="msgTelefone1()" name="tel" type="text" class="form-control" placeholder="(DDD) + Número" aria-label="(DDD) 9 xxxx-xxxx">
                <span class="p-1 validacao" id="msg_tel"></span>
            </div>
        </div>
        <br>
        <div class="row p-2">
            <h4>Endereço</h4>
            <div class="col-2">
                <h6>CEP: </h6>
                <input id="cep" name="cep" type="text" class="form-control" placeholder="CEP" aria-label="CEP">
                <span class="p-1 validacao" id="msg_cep"></span>
            </div>
            <div class="col-8">
                <h6>Endereço: </h6>
                <input id="endereco" name="endereco" type="text" class="form-control" placeholder="Rua ou Avenida" aria-label="Lagradouro">
            </div>
            <div class="col-2">
                <h6>Número: </h6>
                <input id="numero_casa" name="numero_casa" type="text" class="form-control" placeholder="Nº" aria-label="Número da casa">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-4">
                <h6>Bairro: </h6>
                <input id="bairro" name="bairro" type="text" class="form-control" placeholder="Bairro" aria-label="Bairro">
            </div>
            <div class="col-4">
                <h6>Cidade: </h6>
                <input id="cidade" name="cidade" type="text" class="form-control" placeholder="Cidade" aria-label="Cidade">
            </div>
            <div class="col-4">
                <h6>Complemento: </h6>
                <input id="complemento" name="complemento" type="text" class="form-control" placeholder="Complemento" aria-label="Complemento do endereço">
            </div>
        <!--    <div class="col-1">
                <h6>Estado: </h6>
                <select class="form-control" id="uf" name="uf">
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div> -->
        </div>
            
        <button name="cadastrar" id="cadastrar" class="btn btn-primary mt-2">Cadastrar</a>
    </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
    
    function validaSenha() {
        var senha = document.getElementById("senha");
        var msg = document.getElementById("msg_senha");
        var tamanho_senha = document.getElementById("senha").value.length;
        if (tamanho_senha > 7) {
            msg.style.display = "inline";
            msg.style.color = "green";
            msg.innerHTML = "Senha válida!";
        } else {
            msg.style.display = "inline";
            msg.style.color = "red";
            msg.innerHTML = "Senha inválida!";
        }
    }

    function validaConfirmaSenha() {
        var senha = document.getElementById("senha").value;
        var confirma_senha = document.getElementById("confirma-senha").value;
        var msg = document.getElementById("msg_confirma_senha");
        if (senha === confirma_senha) {
            msg.style.display = "inline";
            msg.style.color = "green";
            msg.innerHTML = "As senhas combinam!";
        } else {
            msg.style.display = "inline";
            msg.style.color = "red";
            msg.innerHTML = "As senhas não combinam!";
        }
    }

    //validacao CPF + Mensagem
    
    function CpfValido(cpf) {
        if (cpf == "00000000000") return false;
        if (cpf.length != 11) return false;

        var soma = 0;
        var resto;

        for (i = 1; i <= 9; i++) {
            soma = soma + (parseInt(cpf.substring(i - 1, i)) * (11 - i));
        }

        resto = (soma * 10) % 11;
        if ((resto == 10) || (resto == 11))
            resto = 0;

        if (resto != parseInt(cpf.substring(9, 10)))
            return false;

        soma = 0;
        for (i = 1; i <= 10; i++) {
            soma = soma + (parseInt(cpf.substring(i - 1, i)) * (12 - i))
        };

        resto = (soma * 10) % 11;
        if ((resto == 10) || (resto == 11))
            resto = 0;

        if (resto != parseInt(cpf.substring(10, 11)))
            return false;

        return true;
    }

    function msgCpf() {
        var cpf = document.getElementById("cpf").value;
        var msg = document.getElementById("msg_cpf");
        if (CpfValido(cpf)) {
            msg.style.display = "inline";
            msg.style.color = "green";
            msg.innerHTML = "CPF válido!";
        } else {
            msg.style.display = "inline";
            msg.style.color = "red";
            msg.innerHTML = "CPF inválido!";
        }
    }

    //validacao CNPJ + Mensagem

    function validaCNPJ (cnpj) {
        var b = [ 6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2 ]
        var c = String(cnpj).replace(/[^\d]/g, '')
        
        if(c.length !== 14)
            return false

        if(/0{14}/.test(c))
            return false

        for (var i = 0, n = 0; i < 12; n += c[i] * b[++i]);
        if(c[12] != (((n %= 11) < 2) ? 0 : 11 - n))
            return false

        for (var i = 0, n = 0; i <= 12; n += c[i] * b[i++]);
        if(c[13] != (((n %= 11) < 2) ? 0 : 11 - n))
            return false

        return true
    }

    function msgCnpj() {
        var cnpj = document.getElementById("cnpj").value;
        var msg = document.getElementById("msg_cnpj");
        if (validaCNPJ(cnpj)) {
            msg.style.display = "inline";
            msg.style.color = "green";
            msg.innerHTML = "CNPJ válido!";
        } else {
            msg.style.display = "inline";
            msg.style.color = "red";
            msg.innerHTML = "CNPJ inválido!";
        }
    }

    //validacao Email + Mensagem

    function validarEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
    
    function msgEmail() {
        var email = document.getElementById("email").value;
        var msg = document.getElementById("msg_email");
        if (validarEmail(email)) {
            msg.style.display = "inline";
            msg.style.color = "green";
            msg.innerHTML = "Email válido!";
        } else {
            msg.style.display = "inline";
            msg.style.color = "red";
            msg.innerHTML = "Email inválido!";
        }
    }
    
    //validacao Telefone + Mensagem

    function telefone_validation(telefone) {
        telefone = telefone.replace(/\D/g, '');

        if (!(telefone.length >= 10 && telefone.length <= 11)) return false;

        if (telefone.length == 11 && parseInt(telefone.substring(2, 3)) != 9) return false;

        for (var n = 0; n < 10; n++) {
            if (telefone == new Array(11).join(n) || telefone == new Array(12).join(n)) return false;
        }

        var codigosDDD = [11, 12, 13, 14, 15, 16, 17, 18, 19,
            21, 22, 24, 27, 28, 31, 32, 33, 34,
            35, 37, 38, 41, 42, 43, 44, 45, 46,
            47, 48, 49, 51, 53, 54, 55, 61, 62,
            64, 63, 65, 66, 67, 68, 69, 71, 73,
            74, 75, 77, 79, 81, 82, 83, 84, 85,
            86, 87, 88, 89, 91, 92, 93, 94, 95,
            96, 97, 98, 99];
       
        if (codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) return false;
        if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) return false;

        return true;
    }

    function msgTelefone1() {
        var telefone = document.getElementById("tel1").value;
        var msg = document.getElementById("msg_tel");
        if (telefone_validation(telefone)) {
            msg.style.display = "inline";
            msg.style.color = "green";
            msg.innerHTML = "Telefone válido!";
        } else {
            msg.style.display = "inline";
            msg.style.color = "red";
            msg.innerHTML = "Telefone inválido!";
        }
    }

    $("#cep").blur(function(){
        // Remove tudo o que não é número para fazer a pesquisa
        var cep = this.value.replace(/[^0-9]/, "");
        
        // Validação do CEP; caso o CEP não possua 8 números, então cancela
        // a consulta
        if(cep.length != 8){
            return false;
        }
        
        // A url de pesquisa consiste no endereço do webservice + o cep que
        // o usuário informou + o tipo de retorno desejado (entre "json",
        // "jsonp", "xml", "piped" ou "querty")
        var url = "https://viacep.com.br/ws/"+cep+"/json/";
        
        // Faz a pesquisa do CEP, tratando o retorno com try/catch para que
        // caso ocorra algum erro (o cep pode não existir, por exemplo) a
        // usabilidade não seja afetada, assim o usuário pode continuar//
        // preenchendo os campos normalmente
        $.getJSON(url, function(dadosRetorno){
            try{
                // Preenche os campos de acordo com o retorno da pesquisa
                $("#endereco").val(dadosRetorno.logradouro);
                $("#bairro").val(dadosRetorno.bairro);
                $("#cidade").val(dadosRetorno.localidade);
            }catch(ex){}
        });
    });

</script>

<?php 
    include "../../config/footer/footer.php"; 
?>