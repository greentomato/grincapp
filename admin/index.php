<?php 
    include_once('php//includes/definer.php');
    include('php/checkers/login.checker.php');
    include(INC.'php/bootstrap.php');
?>
<!DOCTYPE html>
<html lang="es-ar">
<head>
    <script><?php include('php/includes/definer.js'); ?></script>
    <title>Lucía Celasco - Administrador</title>
    <?php include('tpl/head.tpl'); ?>
</head>

<body class="">

    <?php 
        include('tpl/header.tpl') ;
        include('tpl/menu.tpl');
    ?>

    <!-- MAIN PANEL -->
    <div id="main" role="main">
        <?php include('tpl/home.tpl'); ?>
    </div>
    <!-- /MAIN PANEL -->

    <?php 
        include('tpl/footer.tpl');
        include('tpl/scripts.tpl');
        include('tpl/modal.tpl');
    ?>

    <!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
    <script src="js/plugin/flot/jquery.flot.cust.min.js"></script>
    <script src="js/plugin/flot/jquery.flot.resize.min.js"></script>
    <script src="js/plugin/flot/jquery.flot.fillbetween.min.js"></script>
    <script src="js/plugin/flot/jquery.flot.orderBar.min.js"></script>
    <script src="js/plugin/flot/jquery.flot.pie.min.js"></script>
    <script src="js/plugin/flot/jquery.flot.tooltip.min.js"></script>

    
    <script src="js/home.js"></script>

</body>
</html>