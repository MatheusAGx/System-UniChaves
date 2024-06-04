<?php
include "../../config/config.php";

if(!isset($_SESSION)) {
    session_start();
}
$id = $_GET['id'];

if (isset($_POST["deletar"])) {
    $q_delete = "DELETE FROM chave WHERE id = '$id'";
    $delete = $conn->query($q_delete);

    if ($delete) {
        header("Location: ../../chaves/index.php");
    } else {
        $erro = true;
        $msg = "Erro na operação! Não foi possível deletar esta chave!";
    }
}

$q_busca_chave = "SELECT * FROM chave WHERE id = '$id'";
$busca_chave = $conn->query($q_busca_chave);


include "view.php";