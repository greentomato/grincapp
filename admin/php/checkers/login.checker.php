<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION['log']) || $_SESSION['log'] != 'usuarioValido') {
    session_destroy();
    header('location: '.URL.'login');
    exit();
}
?>