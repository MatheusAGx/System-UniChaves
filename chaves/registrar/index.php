<?php
include "../../config/config.php";

if(!isset($_SESSION)) {
    session_start();
}

$id = $conn->real_escape_string($_GET['id']);

if(isset($_POST['registrar'])) {

    $id_usuario = $conn->real_escape_string($_POST['id_usuario']);
    $data_devolucao = $conn->real_escape_string($_POST['data_devolucao']);
    $observacoes = $conn->real_escape_string($_POST['observacoes']);
    $id_chave = $conn->real_escape_string($_POST['id_chave']);

    $q_busca_registro = "SELECT id_status FROM chave WHERE id = '$id' AND id_status = 2";
    $busca_registro = $conn->query($q_busca_registro);

    if ($busca_registro->num_rows == 1) {
        $erro = true;
        $msg = "Erro na operação! Essa chave ja está registrada!";
    } else {
        $q_insert = "INSERT INTO registros (id_usuario, id_chave, data_devolucao, data_registro, dias, observacao) VALUES ('$id_usuario', '$id_chave', '$data_devolucao', CURRENT_TIMESTAMP, 0, '$observacoes')";
        $insert = $conn->query($q_insert);

        if ($insert) {
            $sucesso = true;
            $msg = "Operação realizada com sucesso!";
            $id_insert = mysqli_insert_id($conn);

            $q_update = "UPDATE chave SET id_status = 2, id_registro = '$id_insert' WHERE id = '$id'";
            $update = $conn->query($q_update);
        } else {
            $erro = true;
            $msg = "Erro na operação! Por favor reveja as informações";
        }
    }
               
}

$q_buscar_usuario = "SELECT id, nome FROM usuarios";
$busca_usuario = $conn->query($q_buscar_usuario);

$q_busca_intituicao = "SELECT id,descricao FROM usuarios_instituicao";
$busca_instituicao = $conn->query($q_busca_intituicao);

$q_busca_chave = "SELECT id FROM chave WHERE id = '$id'";
$busca_chave = $conn->query($q_busca_chave);

$q_busca_data = "SELECT data_devolucao FROM registros WHERE id = '$id'";
$busca_data = $conn->query($q_busca_data);
$data = $busca_data->fetch_object();
$data_atual = date('Y-m-d H-i-s');

/* if ($data->data_devolucao == $data_atual) {
    $q_busca_cont = "SELECT contador FROM chave WHERE id = '$id'";
    $busca_cont = $conn->query($q_busca_cont);
    $cont = $busca_cont->fetch_object();
    $cont_mais = $cont->contador + 1;
    if ($cont->contador == '') {
        $q_update = "UPDATE chave SET contador = 1 WHERE id = '$id'";
        $update = $conn->query($q_update);
    } else {
        $q_update = "UPDATE chave SET contador '$cont_mais' WHERE id = '$id'";
        $update = $conn->query($q_update);
    }
} */

include "view.php";