<?php
session_start();
if (!isset($_POST['zona']) || !isset($_POST['dimension']) || !isset($_POST['sol']) || !isset($_POST['location'])) { //no viene por post
    if (!isset($_SESSION['userSelection'])) { //no visito esta pagina durante la sesion
        session_destroy();
        header('location: '.URL);
        exit();
    }
}
?>
