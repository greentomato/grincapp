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
</head>

<body class="">

    <?php 
        include('tpl/header.tpl') ;
        include('tpl/menu.tpl');
    ?>

    <!-- MAIN PANEL -->
    <div id="main" role="main">
        <?php include('php/printers/espacio.printer.php'); ?>
    </div>
    <!-- /MAIN PANEL -->

    <?php 
        include('tpl/footer.tpl');
        include('tpl/scripts.tpl');
    ?>
    
    <script src="js/plugin/jquery-form/jquery-form.min.js"></script>
    <script src="js/boxMessage.js"></script>
    <script src="js/espacio.js"></script>

</body>
</html>