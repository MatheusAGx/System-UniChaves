<?php
include "../../config/config.php";

if(!isset($_SESSION)) {
    session_start();
}
$id = $_GET['id'];


if (isset($_POST['cadastrar'])) {

    $nome = $conn->real_escape_string($_POST['nome']);
    $instituicao = $conn->real_escape_string($_POST['instituicao']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $id_usuario = $_SESSION['id'];

    $q_update_chave = "UPDATE chave SET nome = '$nome', descricao = '$descricao', id_instituicao = '$instituicao', id_usuario = '$id_usuario' WHERE id = '$id'";

    if ($nome == '') {
        $erro = true;
        $msg = "O nome está vazio!";
    } else {
        $update = $conn->query($q_update_chave);

        if ($update) {
            $sucesso = true;
            $msg = "Operação realizada com sucesso!";
        } else {
            $erro = true;
            $msg = "Erro na operação! Por favor reveja as informações";
        }

    }
}

$q_busca_chave = "SELECT *, (SELECT descricao FROM chave_instituicao WHERE id = id_instituicao) as instituicao FROM chave WHERE id = '$id'";
$busca_chave = $conn->query($q_busca_chave);

$q_busca_intituicao = "SELECT * FROM chave_instituicao";
$busca_instituicao = $conn->query($q_busca_intituicao);

include "view.php";
