<?php
include "../../config/config.php";

$id = $_GET['id'];

$q_busca_dados = "SELECT DATE_FORMAT(data_devolucao, '%d/%m/%Y') as data_dev, (SELECT descricao FROM chave_instituicao WHERE id = id_instituicao) AS instituicao, (SELECT nome FROM usuarios WHERE id = id_usuario) as usuario, (SELECT nome FROM chave WHERE id = id_chave) as chave, observacao FROM registros WHERE id = '$id'";
$busca_dados = $conn->query($q_busca_dados);

if (isset($_POST['devolver'])) {
    $q_devolve_chave = "UPDATE chave SET contador = 0, id_status = 1 WHERE id = '$id'";
    $devolve_chave = $conn->query($q_devolve_chave);

    if($devolve_chave) {
        $sucesso = true;
        $msg = "Operação realizada com sucesso!";
    } else {
        $erro = true;
        $msg = "Erro na operação! Por favor reveja as informações";
    }
}

include "view.php";