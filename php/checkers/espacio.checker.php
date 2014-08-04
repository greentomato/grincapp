<?php
session_start();
if (!isset($_SESSION['userSelection'])) {
    session_destroy();
    header('location: '.URL);
    exit();
}
?>
