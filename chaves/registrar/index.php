<?php
include "../../config/config.php";

if(!isset($_SESSION)) {
    session_start();
}
$id = $_GET['id'];

$q_buscar_usuario = "SELECT id, nome FROM usuarios";
$busca_usuario = $conn->query($q_buscar_usuario);

$q_busca_intituicao = "SELECT id,descricao FROM usuarios_instituicao";
$busca_instituicao = $conn->query($q_busca_intituicao);

include "view.php";