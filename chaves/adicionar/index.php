<?php
include "../../config/config.php";

if(!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['cadastrar'])) {

    $nome = $conn->real_escape_string($_POST['nome']);
    $instituicao = $conn->real_escape_string($_POST['instituicao']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $id_usuario = $_SESSION['id'];

    $q_insert_chave = "INSERT INTO chave (nome, descricao, id_instituicao, id_status, id_usuario) VALUES ('$nome', '$descricao', '$instituicao', 1, '$id_usuario')";

    if ($nome == '') {
        $erro = true;
        $msg = "O nome está vazio!";
    } else {
        $insert = $conn->query($q_insert_chave);

        if ($insert) {
            $sucesso = true;
            $msg = "Operação realizada com sucesso!";
        } else {
            $erro = true;
            $msg = "Erro na operação! Por favor reveja as informações";
        }

    }
}

$q_busca_intituicao = "SELECT * FROM chave_instituicao";
$busca_instituicao = $conn->query($q_busca_intituicao);

include "view.php";

