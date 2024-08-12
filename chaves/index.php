
<?php
include "../config/config.php";

$q_busca_chave = "SELECT *, (SELECT descricao FROM chave_instituicao WHERE id = id_instituicao) AS instituicao, (SELECT descricao FROM chave_status WHERE id = id_status) AS tipo, (SELECT nome FROM usuarios WHERE id=id_registro) as usuario, (SELECT observacao FROM registros WHERE id = id_registro) as observacao FROM chave ";


if (isset($_POST['filtrar'])) 
{
    $nome = $conn->real_escape_string($_POST['filtro_nome']);

    $q_busca_chave .= "WHERE nome LIKE '%$nome%' ";

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 10;
    $pagination = paginate($conn, 'chave', $page, $perPage, $q_busca_chave);

} else {
    
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 10;
    $pagination = paginate($conn, 'chave', $page, $perPage, $q_busca_chave);
}

$q_busca_instituicao = "SELECT id,descricao FROM chave_instituicao";
$busca_institicao = $conn->query($q_busca_instituicao);

$q_busca_status = "SELECT id,descricao FROM chave_status";
$busca_status = $conn->query($q_busca_status);

/*$q_busca_data = "SELECT data_devolucao FROM registros WHERE id = '$id'";
$busca_data = $conn->query($q_busca_data);
$data = $busca_data->fetch_object();

if ($data->data_devolucao == $data_atual) {
    $q_busca_cont = "SELECT contador, registrada FROM chave WHERE id = '$id'";
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
}
*/
include "view.php";