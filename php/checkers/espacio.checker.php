<?php
session_start();
if (!isset($_SESSION['userSelection']) && $_SESSION['log'] != 'usuarioValido') {
    session_destroy();
    header('location: '.URL);
    exit();
}
?>
