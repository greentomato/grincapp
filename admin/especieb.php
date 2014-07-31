<?php
include_once('php//includes/definer.php');
include('php/checkers/login.checker.php');
include('php/controllers/borrarImagenesHuerfanas.controller.php');
?>
<!DOCTYPE html>
<html lang="es-ar">
<head>
    <script><?php include('php/includes/definer.js'); ?></script>
    <title>Grinc - Administrador</title>
    <?php include('tpl/head.tpl'); ?>
    <style>
        @media only screen and (min-width: 320px) {
            .superbox-list {
                width: 49%;
            }
        }
        @media only screen and (min-width: 486px) {
            .superbox-list {
                width: 24.2%;
            }
        }
        @media only screen and (min-width: 768px) {
            .superbox-list {
                width: 16.3%;
            }
        }
        @media only screen and (min-width: 1025px) {
            .superbox-list {
                width: 12.2%;
            }
        }
        @media only screen and (min-width: 1824px) {
            .superbox-list {
                width: 12.3%;
            }
        }
        .superbox-img:hover {
            opacity: 1;
        }
        .superbox-list a {position: absolute; right: 6px; bottom: 6px}
        .superbox-list .btn:active {position: absolute; top: inherit !important; left: inherit !important}
        .superbox-img {cursor: move}
    </style>
</head>

<body class="">

    <?php 
        include('tpl/header.tpl') ;
        include('tpl/menu.tpl');
    ?>

    <!-- MAIN PANEL -->
    <div id="main" role="main">
        <?php include('php/printers/especie.printer.php'); ?>
    </div>
    <!-- /MAIN PANEL -->

    <?php 
        include('tpl/footer.tpl');
        include('tpl/scripts.tpl');
    ?>
    
    <script src="js/plugin/jquery-form/jquery-form.min.js"></script>
    <script src="js/especie.js"></script>
    <script src="js/boxMessage.js"></script>

</body>
</html>