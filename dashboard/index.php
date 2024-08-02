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

include "view.php";