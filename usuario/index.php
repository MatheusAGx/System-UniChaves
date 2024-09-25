<?php
include "../config/config.php";

if (isset($_POST['filtrar'])) 
{
    $nome = $conn->real_escape_string($_POST['filtro_nome']);
    $cpf = $conn->real_escape_string($_POST['filtro_cpf']);
    $email = $conn->real_escape_string($_POST['filtro_email']);
    $telefone = $conn->real_escape_string($_POST['filtro_telefone']);

   $q_busca_usuario = "SELECT *, (SELECT descricao FROM usuarios_tipo WHERE id = id_usuario_tipo) AS tipo, (SELECT descricao FROM usuarios_instituicao WHERE id = id_instituicao) AS instituicao FROM usuarios WHERE 1=1 ";

    /*$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 10;
    $pagination = paginate($conn, 'usuarios', $page, $perPage, $q_busca_usuario); */

    if (!empty($nome)) {
        $q_busca_usuario .= "AND nome LIKE '%$nome%' ";
    
    } 
    if (!empty($cpf)) {
        $q_busca_usuario .= "AND cpf LIKE '%$cpf%' OR cnpj LIKE '%$cpf%' ";
    } 
    if (!empty($email)) {
        $q_busca_usuario .= "AND email LIKE '%$email%' ";
    }
    if (!empty($telefone)) {
        $q_busca_usuario .= "AND telefone LIKE '%$telefone%' ";
    }

    $q_busca_usuario .= "ORDER BY nome ASC";
    
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 10;
    $pagination = paginate($conn, 'usuarios', $page, $perPage, $q_busca_usuario);
    

} else {
    $q_busca_usuario = "SELECT *, (SELECT descricao FROM usuarios_tipo WHERE id = id_usuario_tipo) AS tipo, (SELECT descricao FROM usuarios_instituicao WHERE id = id_instituicao) AS instituicao FROM usuarios ORDER BY nome ASC";
    
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 10;
    $pagination = paginate($conn, 'usuarios', $page, $perPage, $q_busca_usuario);
}


include "view.php";