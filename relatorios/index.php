<?php
include "../config/config.php";
$q_busca_chave = "SELECT *,(SELECT descricao FROM chave_instituicao WHERE id = id_instituicao) as instituicao, (SELECT descricao FROM chave_status WHERE id = id_status) as status, (SELECT nome FROM usuarios WHERE id = id_usuario) as usuario FROM chave";
//$q_busca_chave = "SELECT nome, id_instituicao, id_status, id_usuario, (SELECT descricao FROM chave_instituicao) as instituicao, (SELECT descricao FROM chave) as status, (SELECT nome FROM usuarios) as usuarios FROM chave";
$busca_chave = $conn->query($q_busca_chave);

include "view.php";