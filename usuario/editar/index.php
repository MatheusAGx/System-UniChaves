<?php
include "../../config/config.php";

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

$id = $_GET['id'];

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

    echo $instituicao;
    echo $tipo;

    /* id_usuario = $_SESSION['id']; */
    $senha = sha1($senhas);

    $q_update = "UPDATE usuarios SET 
        nome = '$nome',
        senha = '$senha',
        cpf = '$cpf',
        cnpj = '$cnpj',
        email = '$email',
        telefone = '$tel',
        endereco = '$endereco',
        bairro = '$bairro',
        cep = '$cep',
        numero = '$numero_casa',
        cidade = '$cidade',
        uf = '$uf',
        id_instituicao = '$instituicao',
        id_usuario_tipo = '$tipo',
        complemento = '$complemento'
     WHERE id = '$id' ";

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

        $update = $conn->query($q_update);

        if ($update) {
            $sucesso = true;
            $msg = "Operação realizada com sucesso!";
        } else {
            $erro = true;
            $msg = "Erro na operação! Por favor reveja as informações";
        }

    }

}

$q_buscar_usuario = "SELECT *, (SELECT descricao FROM usuarios_tipo WHERE id = id_usuario_tipo) as tipo, (SELECT descricao FROM usuarios_instituicao WHERE id = id_instituicao) as instituicao  FROM usuarios WHERE id = '$id' ";
$busca_usuario = $conn->query($q_buscar_usuario);

$q_busca_intituicao = "SELECT * FROM usuarios_instituicao";
$busca_instituicao = $conn->query($q_busca_intituicao);

$q_busca_tipo = "SELECT * FROM usuarios_tipo";
$busca_tipo = $conn->query($q_busca_tipo);

include "view.php";
