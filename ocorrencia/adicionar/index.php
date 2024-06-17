<?php 
include "../../config/config.php";


if(isset($_POST['registrar'])) {
    $usuario = $conn->real_escape_string($_POST['usuario']);
    $chave = $conn->real_escape_string($_POST['chave']);
    $data_ocorrencia = $conn->real_escape_string($_POST['data_ocorrencia']);
    $hora_ocorrencia = $conn->real_escape_string($_POST['hora']);
    $ocorrencia = $conn->real_escape_string($_POST['ocorrencia']);

    if (empty($usuario)) {
        $erro = true;
        $msg = "Usuário não selecionado! Por favor selecione um usuário para esta ocorrência!";
    } else if (empty($chave)) {
        $erro = true;
        $msg = "Chave não selecionada! Por favor selecione uma chave para esta ocorrência!";
    } else if (empty($data_ocorrencia)) {
        $erro = true;
        $msg = "Data não selecionada! Por favor selecione uma data para esta ocorrência!";
    } else if (empty($ocorrencia)) {
        $erro = true;
        $msg = "Descrição vazia! Por favor faça uma descrição desta ocorrência!";
    }

    $q_insert_ocorrencia = "INSERT INTO ocorrencia (descricao, id_usuario, id_chave, data_ocorrencia, hora_ocorrencia) VALUES ('$ocorrencia', '$usuario', '$chave', '$data_ocorrencia', '$hora_ocorrencia')";
    $insert = $conn->query($q_insert_ocorrencia);

        if ($insert) {
            $sucesso = true;
            $msg = "Operação realizada com sucesso!";
        } else {
            $erro = true;
            $msg = "Erro na operação! Por favor reveja as informações";
        }
}


$q_busca_chave = "SELECT * FROM chave";
$busca_chave = $conn->query($q_busca_chave);

$q_busca_usuario = "SELECT * FROM usuarios";
$busca_usuario = $conn->query($q_busca_usuario);

include "view.php";