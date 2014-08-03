<?php
include_once('php//includes/definer.php');
include('php/checkers/login.checker.php');
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
        <?php include('php/printers/region.printer.php'); ?>
    </div>
    <!-- /MAIN PANEL -->

    <?php 
        include('tpl/footer.tpl');
        include('tpl/scripts.tpl');
    ?>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/plugin/mapToolbar/mapToolbar.js"></script>
    <script src="js/boxMessage.js"></script>
    <script src="js/region.js"></script>

</body>
</html>