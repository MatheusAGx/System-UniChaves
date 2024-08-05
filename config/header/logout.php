<?php 
include "config.php";

function logout() {
    session_destroy();
    header("Location: ../login");
};

logout();

?>
