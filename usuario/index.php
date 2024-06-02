<?php
include "../config/config.php";

$q_busca_usuario = "SELECT *, (SELECT descricao FROM usuarios_tipo WHERE id = id_usuario_tipo) AS tipo, (SELECT descricao FROM usuarios_instituicao WHERE id = id_instituicao) AS instituicao FROM usuarios";

$busca_usuario = $conn->query($q_busca_usuario);


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;

$pagination = paginate($conn, 'usuarios', $page, $perPage, $q_busca_usuario);

include "view.php";