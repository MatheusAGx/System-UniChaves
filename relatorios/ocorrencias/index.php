<?php
include "../../config/config.php";

$q_busca_ocorrencia = "SELECT DATE_FORMAT(data_ocorrencia, '%d/%m/%Y') as data_oc , TIME_FORMAT(hora_ocorrencia, '%H:%i') as hora, (SELECT nome FROM chave WHERE id = id_chave) as chave, (SELECT nome FROM usuarios WHERE id = id_usuario) as usuario FROM ocorrencia ";
$q_busca_chave = "SELECT * FROM chave";
$busca_chave = $conn->query($q_busca_chave);
$q_busca_usuario ="SELECT * FROM usuarios";
$busca_usuario = $conn->query($q_busca_usuario);
$q_busca_instituicao = "SELECT * FROM chave_instituicao";
$busca_instituicao = $conn->query($q_busca_instituicao);

if (isset($_POST['filtrar'])) 
{
    $chave = $conn->real_escape_string($_POST['filtro_chave']);
    $usuario = $conn->real_escape_string($_POST['filtro_usuario']);
    $data_dev = $conn->real_escape_string($_POST['filtro_data_oc']);


    if (!empty($chave)) {
        $q_busca_ocorrencia .= "WHERE id_chave = '$chave' ";
    
    } else if (!empty($usuario)) {
        $q_busca_ocorrencia .= "WHERE id_usuario = '$usuario' ";

    } else if (!empty($data_dev)) {
        $q_busca_ocorrencia .= "WHERE data_ocorrencia = '$data_dev' ";

    }

    $q_busca_ocorrencia .= "ORDER BY data_ocorrencia DESC";

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 15;
    $pagination = paginate($conn, 'chave', $page, $perPage, $q_busca_ocorrencia);
    
} 
else 
{ 
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 15;
    $pagination = paginate($conn, 'chave', $page, $perPage, $q_busca_ocorrencia);
}

 
include "view.php";
?>

