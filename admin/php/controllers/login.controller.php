<?php
session_start();
include_once('../bootstrap.php');
if ($usuario = Usuario::isValido($_POST['usuario'], $_POST['pass'])) {
    $_SESSION['log'] = 'usuarioValido';
    header('location: ../../');
} else {
    session_destroy();
    header('location: ../../login');
    exit();
}
?>
