<?php
include_once "index.php";
$busca_ocorrencia = $conn->query($q_busca_ocorrencia);

if($busca_ocorrencia->num_rows > 0){ 
        $delimiter = ","; 
        $filename = "relatorio-ocorrencias.csv"; 
         
        // Create a file pointer 
        $f = fopen('php://memory', 'w'); 
         
        // Set column headers 
        $fields = array('Chave', 'Usuário', 'Data da Ocorrência', 'Hora de Ocorrência'); 
        fputcsv($f, $fields, $delimiter); 
         
        // Output each row of the data, format line as csv and write to file pointer 
        while($row = $busca_ocorrencia->fetch_assoc()){ 
            $lineData = array($row['chave'], $row['usuario'], $row['data_oc'], $row['hora']); 
            fputcsv($f, $lineData, $delimiter); 
        } 
         
        // Move back to beginning of file 
        fseek($f, 0); 
         
        // Set headers to download file rather than displayed 
        header('Content-Type: text/csv'); 
        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
         
        //output all remaining data on a file pointer 
        fpassthru($f); 
    } 