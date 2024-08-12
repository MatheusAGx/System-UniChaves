<?php
include "../../config/config.php";

$q_busca_registro = "SELECT DATE_FORMAT(data_devolucao, '%d/%m/%Y') as data_dev , (SELECT descricao FROM chave_instituicao WHERE id=id_instituicao) as instituicao, (SELECT nome FROM chave WHERE id = id_chave) as chave, (SELECT nome FROM usuarios WHERE id = id_usuario) as usuario FROM registros ";
$q_busca_instituicao = "SELECT * FROM chave_instituicao";
$busca_instituicao = $conn->query($q_busca_instituicao);

if (isset($_POST['filtrar'])) 
{
    $chave = $conn->real_escape_string($_POST['filtro_chave']);
    $usuario = $conn->real_escape_string($_POST['filtro_usuario']);
    $data_dev = $conn->real_escape_string($_POST['filtro_data_dev']);


    if (!empty($chave)) {
        $q_busca_registro .= "WHERE chave LIKE '%$chave%' ";
    
    } else if (!empty($usuario)) {
        $q_busca_registro .= "WHERE usuario LIKE '%$usuario%' ";

    } else if (!empty($data_dev)) {
        $q_busca_registro .= "WHERE data_devolucao = '$data_dev' ";

    }

    $q_busca_registro .= "ORDER BY data_devolucao DESC";

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 15;
    $pagination = paginate($conn, 'chave', $page, $perPage, $q_busca_registro);
    
} 
else 
{ 
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 15;
    $pagination = paginate($conn, 'chave', $page, $perPage, $q_busca_registro);
}

include "view.php";