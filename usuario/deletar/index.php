<?php
include "../../config/config.php";

if(!isset($_SESSION)) {
    session_start();
}
$id = $_GET['id'];

if (isset($_POST["deletar"])) {
    $q_delete = "DELETE FROM usuarios WHERE id = '$id'";
    $delete = $conn->query($q_delete);

    if ($delete) {
        header("Location: ../../usuario/");
    } else {
        $erro = true;
        $msg = "Erro na operação! Não foi possível deletar este usuário!";
    }
}

$q_busca_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$busca_usuario = $conn->query($q_busca_usuario);


include "view.php";