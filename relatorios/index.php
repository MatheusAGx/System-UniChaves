<?php
include "../config/config.php";
$q_busca_chave = "SELECT *,(SELECT descricao FROM chave_instituicao WHERE id = id_instituicao) as instituicao, (SELECT descricao FROM chave_status WHERE id = id_status) as status, (SELECT nome FROM usuarios WHERE id = id_usuario) as usuario FROM chave LIMIT 12";
//$q_busca_chave = "SELECT nome, id_instituicao, id_status, id_usuario, (SELECT descricao FROM chave_instituicao) as instituicao, (SELECT descricao FROM chave) as status, (SELECT nome FROM usuarios) as usuarios FROM chave";
$busca_chave = $conn->query($q_busca_chave);

//CONTA CHAVES
$q_total_chave = "SELECT COUNT(*) FROM chave";
$total_chave = $conn->query($q_total_chave);
$t_chave = $total_chave->fetch_array();

$q_chave_disp = "SELECT COUNT(*) FROM chave WHERE id_status = 1";
$chave_disp = $conn->query($q_chave_disp);
$d_chave = $chave_disp->fetch_array();

$q_chave_ocup = "SELECT COUNT(*) FROM chave WHERE id_status = 2";
$chave_ocup = $conn->query($q_chave_ocup);
$oc_chave = $chave_ocup->fetch_array();

//CONTA REGISTROS POR MÊS
$q_registro_agosto = "SELECT COUNT(id) FROM registros WHERE data_registro BETWEEN '2024-08-01' AND '2024-09-01'";
$registro_agosto = $conn->query($q_registro_agosto);
$reg_agosto = $registro_agosto->fetch_array();

$q_registro_setembro = "SELECT COUNT(id) FROM registros WHERE data_registro BETWEEN '2024-09-01' AND '2024-10-01'";
$registro_setembro = $conn->query($q_registro_setembro);
$reg_setembro = $registro_setembro->fetch_array();

$q_registro_outubro = "SELECT COUNT(id) FROM registros WHERE data_registro BETWEEN '2024-10-01' AND '2024-11-01'";
$registro_outubro = $conn->query($q_registro_outubro);
$reg_outubro = $registro_outubro->fetch_array();

$q_registro_novembro = "SELECT COUNT(id) FROM registros WHERE data_registro BETWEEN '2024-11-01' AND '2024-12-01'";
$registro_novembro = $conn->query($q_registro_novembro);
$reg_novembro = $registro_novembro->fetch_array();

$q_registro_dezembro = "SELECT COUNT(id) FROM registros WHERE data_registro BETWEEN '2024-12-01' AND '2025-01-01'";
$registro_dezembro = $conn->query($q_registro_dezembro);
$reg_dezembro = $registro_dezembro->fetch_array();

//CONTA REGISTRO POR INSTITUICAO
$q_registro_ft = "SELECT COUNT(id) FROM registros WHERE id_instituicao = 1";
$registro_ft = $conn->query($q_registro_ft);
$reg_ft = $registro_ft->fetch_array();

$q_registro_fca = "SELECT COUNT(id) FROM registros WHERE id_instituicao = 2";
$registro_fca = $conn->query($q_registro_fca);
$reg_fca = $registro_fca->fetch_array();

$q_registro_cotil = "SELECT COUNT(id) FROM registros WHERE id_instituicao = 3";
$registro_cotil = $conn->query($q_registro_cotil);
$reg_cotil = $registro_cotil->fetch_array();

$q_registro_portaria = "SELECT COUNT(id) FROM registros WHERE id_instituicao = 4";
$registro_portaria = $conn->query($q_registro_portaria);
$reg_portaria = $registro_portaria->fetch_array();

include "view.php";