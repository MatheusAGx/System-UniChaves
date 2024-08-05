<?php
include "../config/config.php";

//REGISTROS -> TOTAL - MÊS - DIA
$q_reg_total = "SELECT COUNT(id) FROM registros";
$reg_total = $conn->query($q_reg_total);
$r_total = $reg_total->fetch_array();
//echo $r_total['COUNT(id)'];

$q_reg_mes = "SELECT COUNT(id) FROM registros WHERE data_registro >= CURDATE() - INTERVAL 30 DAY";
$reg_mes = $conn->query($q_reg_mes);
$r_mes = $reg_mes->fetch_array();


$q_reg_dia = "SELECT COUNT(id) FROM registros WHERE data_registro >= CURDATE() - INTERVAL 1 DAY";
$reg_dia = $conn->query($q_reg_dia);
$r_dia = $reg_dia->fetch_array();


//OCORRENCIAS -> TOTAL - MÊS - DIA
$q_ocrr_total = "SELECT COUNT(id) FROM ocorrencia";
$ocrr_total = $conn->query($q_ocrr_total);
$o_total = $ocrr_total->fetch_array();

$q_ocrr_mes = "SELECT COUNT(id) FROM ocorrencia WHERE data_ocorrencia >= CURDATE() - INTERVAL 30 DAY";
$ocrr_mes = $conn->query($q_ocrr_mes);
$o_mes = $ocrr_mes->fetch_array();

$q_ocrr_dia = "SELECT COUNT(id) FROM ocorrencia WHERE data_ocorrencia >= CURDATE() - INTERVAL 1 DAY";
$ocrr_dia = $conn->query($q_ocrr_dia);
$o_dia = $ocrr_dia->fetch_array();

//CHAVES DISPONÍVEIS
$q_chaves_disp = "SELECT COUNT(id) FROM chave WHERE id_registro IS NULL";
$chave_disp = $conn->query($q_chaves_disp);
foreach ( $chave_disp as $disp) {
    $count_disp[] = $disp['COUNT(id)'];
}

$q_chaves_reg = "SELECT COUNT(id) FROM chave WHERE id_registro IS NOT NULL";
$chave_reg = $conn->query($q_chaves_reg);
foreach ( $chave_reg as $reg) {
    $count_reg[] = $reg['COUNT(id)'];
}

$q_chave_usuario = "SELECT (SELECT DATE(data_devolucao)) as data , (SELECT descricao FROM chave_instituicao WHERE id=id_instituicao) as instituicao, (SELECT nome FROM chave WHERE id = id_chave) as chave, (SELECT nome FROM usuarios WHERE id = id_usuario) as usuario FROM registros ORDER BY data_devolucao DESC LIMIT 0, 13";
$chave_usuario = $conn->query($q_chave_usuario);
include "view.php";