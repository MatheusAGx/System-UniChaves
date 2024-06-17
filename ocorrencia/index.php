<?php 
require '../vendor/autoload.php';
include "../config/config.php";

$q_busca_ocorrencia = "SELECT *, (SELECT nome FROM chave WHERE id= id_chave) as chave, (SELECT nome FROM usuarios WHERE id = id_usuario) as usuario FROM ocorrencia";
$busca_ocorrencia = $conn->query($q_busca_ocorrencia);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;

$pagination = paginate($conn, 'chave', $page, $perPage, $q_busca_ocorrencia);


include "view.php";