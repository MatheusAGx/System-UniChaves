<?php
include "../config/config.php";

if (isset($_POST["acessar"])) {
    $username = $_POST["username"];
    $senhainicial = $_POST["senha"];

    $senha = sha1($senhainicial);
    

    $q_busca_login = "SELECT * FROM usuarios WHERE (cpf = '$username' OR cnpj = '$username') AND senha = '$senha'";
    $busca_login = $conn->query($q_busca_login);

    $quantidade = $busca_login->num_rows;

   
    if ($quantidade > 0) {
        $usuario = $busca_login->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("Location: ../usuario/index.php");
    } else {
        echo "Falha ao logar! Email ou senha incorretos!";
    }
}

include "view.php";