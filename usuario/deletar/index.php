<?php
include "../../config/config.php";

if(!isset($_SESSION)) {
    session_start();
}
$id = $_GET['id'];

if (isset($_POST["deletar"])) {
    $q_busca_registro = "SELECT id_usuario, id_chave FROM registros WHERE id_usuario = '$id'";
    $busca_registro = $conn->query($q_busca_registro);
    if($busca_registro->num_rows > 1){
        $erro = true;
        $msg = "Não foi possível excluir o usuário! Existem chaves registradas para este usuário que ainda não foram devolvidas!";
    } else {
        $q_delete = "DELETE FROM usuarios WHERE id = '$id'";
        $delete = $conn->query($q_delete);

        if ($delete) {
            header("Location: ../../usuario/");
        } else {
            $erro = true;
            $msg = "Erro na operação! Não foi possível deletar este usuário!";
        }
    }
}

$q_busca_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$busca_usuario = $conn->query($q_busca_usuario);


include "view.php";