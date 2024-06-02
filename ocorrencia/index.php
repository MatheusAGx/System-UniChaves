<?php 

include "../config/config.php";

$q_busca_usuario = "SELECT id, nome, email FROM usuarios";
$busca_usuario = $conn->query($q_busca_usuario);
$usuarios = $busca_usuario->fetch_object();

include "view.php";