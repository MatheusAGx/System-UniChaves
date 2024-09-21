<?php
include "../../config/config.php";

$valorRua = "";
$valorCidade = "";
$valorBairro = "";

//VALIDAÇÕES ---------------------------------------------------------------
function validarCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) != 11) {
        return false;
    }

    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

function validarCNPJ($cnpj) {
    $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

    if (strlen($cnpj) != 14) {
        return false;
    }

    if (preg_match('/(\d)\1{13}/', $cnpj)) {
        return false;
    }

    $tamanho = strlen($cnpj) - 2;
    $numeros = substr($cnpj, 0, $tamanho);
    $digitos = substr($cnpj, $tamanho);
    
    $soma = 0;
    $pos = $tamanho - 7;
    for ($i = $tamanho; $i >= 1; $i--) {
        $soma += $numeros[$tamanho - $i] * $pos--;
        if ($pos < 2) {
            $pos = 9;
        }
    }

    $resultado = $soma % 11 < 2 ? 0 : 11 - $soma % 11;
    if ($resultado != $digitos[0]) {
        return false;
    }

    $tamanho++;
    $numeros = substr($cnpj, 0, $tamanho);
    $soma = 0;
    $pos = $tamanho - 7;
    for ($i = $tamanho; $i >= 1; $i--) {
        $soma += $numeros[$tamanho - $i] * $pos--;
        if ($pos < 2) {
            $pos = 9;
        }
    }

    $resultado = $soma % 11 < 2 ? 0 : 11 - $soma % 11;
    return $resultado == $digitos[1];
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validarTelefone($telefone) {
    // Remove qualquer máscara, deixando apenas números
    $telefone = preg_replace('/[^0-9]/', '', $telefone);

    // Verifica se o número de telefone tem 10 ou 11 dígitos
    if (strlen($telefone) == 10 || strlen($telefone) == 11) {
        // Verifica se é um telefone fixo ou celular
        if (strlen($telefone) == 10) {
            // Telefone fixo (ex: 11 1234-5678)
            return preg_match('/^[1-9]{2}[2-9][0-9]{7}$/', $telefone);
        } else if (strlen($telefone) == 11) {
            // Telefone celular (ex: 11 91234-5678)
            return preg_match('/^[1-9]{2}9[0-9]{8}$/', $telefone);
        }
    }

    return false;
}

//QUERYS ---------------------------------------------------------------

if (isset($_POST['cadastrar'])) {

    $nome = $conn->real_escape_string($_POST['nome']);
    $instituicao = $conn->real_escape_string($_POST['instituicao']);
    $senhas = $conn->real_escape_string($_POST['senha']);
    $confirm_senha = $conn->real_escape_string($_POST['confirma-senha']);
    $cpf = $conn->real_escape_string(preg_replace('/[^0-9]/', '', $_POST['cpf']));
    $cnpj = $conn->real_escape_string(preg_replace('/[^0-9]/', '', $_POST['cnpj']));
    $email = $conn->real_escape_string($_POST['email']);
    $tel = $conn->real_escape_string(preg_replace('/[^0-9]/', '', $_POST['tel']));
    $cep = $conn->real_escape_string(preg_replace('/[^0-9]/', '', $_POST['cep']));
    $endereco = $conn->real_escape_string($_POST['endereco']);
    $numero_casa = $conn->real_escape_string($_POST['numero_casa']);
    $bairro = $conn->real_escape_string($_POST['bairro']);
    $complemento = $conn->real_escape_string($_POST['complemento']);
    $cidade = $conn->real_escape_string($_POST['cidade']);
    $uf = $conn->real_escape_string($_POST['uf']);
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $id_instituicao = $conn->real_escape_string($_POST['instituicao']);
    $senha = sha1($senhas);

    $q_insert_usuario = "INSERT INTO cl203168.usuarios (nome, senha, cpf, cnpj, email, telefone, endereco, bairro, cep, numero, cidade, uf, id_instituicao, id_usuario_tipo) VALUES ('$nome', '$senha', '$cpf', '$cnpj', '$email', '$tel', '$endereco', '$bairro', '$cep', '$numero_casa', '$cidade', '$uf', '$id_instituicao', '$tipo')";

    if (validarCPF($cpf) == false && !empty($cpf))
    {
        $erro = true;
        $msg = "O CPF não é válido!";
    } else if (validarCNPJ($cnpj) == false && !empty($cnpj)) {
        $erro = true;
        $msg = "O CNPJ não é válido!";
    } else if (validarEmail($email) == false) {
        $erro = true;
        $msg = "O Email não é válido!";
    } else if (validarTelefone($tel) == false) {
        $erro = true;
        $msg = "O telefone não é válido!";
    } else {

        $insert = $conn->query($q_insert_usuario);

        if ($insert) {
            $sucesso = true;
            $msg = "Operação realizada com sucesso!";
        } else {
            $erro = true;
            $msg = "Erro na operação! Por favor reveja as informações";
        }

    }

}

$q_busca_tipo = "SELECT * FROM usuarios_tipo";
$busca_tipo = $conn->query($q_busca_tipo);

$q_busca_intituicao = "SELECT * FROM usuarios_instituicao";
$busca_instituicao = $conn->query($q_busca_intituicao);

include "view.php";

