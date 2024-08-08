<?php
include "../config/config.php";

$q_chave_usuario = "SELECT (SELECT DATE(data_devolucao)) as data , (SELECT descricao FROM chave_instituicao WHERE id=id_instituicao) as instituicao, (SELECT nome FROM chave WHERE id = id_chave) as chave, (SELECT nome FROM usuarios WHERE id = id_usuario) as usuario FROM registros WHERE data_devolucao > CURDATE() - INTERVAL 30 DAY ORDER BY data_devolucao DESC LIMIT 0, 13";
$chave_usuario = $conn->query($q_chave_usuario);

include "view.php";