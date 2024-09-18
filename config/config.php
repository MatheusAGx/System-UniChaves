<?php
$servername = "143.106.241.3";
$username = "cl203168";
$password = "cl*15061998";
$database = "cl203168";

session_start();

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

function paginate($mysqli, $table, $page, $perPage, $query)
{
    // Conta o total de registros na tabela
    $totalQuery = $mysqli->query("SELECT COUNT(*) as total FROM $table");
    $total = $totalQuery->fetch_assoc()['total'];

    // Calcula o total de páginas
    $totalPages = ceil($total / $perPage);

    // Calcula o offset para a consulta
    $offset = ($page - 1) * $perPage;

    // Recupera os registros da página atual
    $stmt = $mysqli->prepare($query . " LIMIT ?, ?");
    $stmt->bind_param("ii", $offset, $perPage);
    $stmt->execute();
    $result = $stmt->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    // Gera os links de navegação
    $pagination = "";
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
            $pagination .= "
            <li class='page-item active' aria-current='page'>
                <span class='page-link'>$i</span>
            </li>";
        } else {
            $pagination .= "
            <li class='page-item'><a class='page-link' href=\"?page=$i\">$i</a></li>";
        }
    }

    return [
        'results' => $results,
        'pagination' => $pagination
    ];
}

$sucesso = false;
$erro = false;
$msg = '';

