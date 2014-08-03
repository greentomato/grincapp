<?php 
    include_once('php//includes/definer.php');
    include('php/checkers/login.checker.php');
    include(INC.'php/bootstrap.php');
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
        <?php include('tpl/esquemas.tpl'); ?>
    </div>
    <!-- /MAIN PANEL -->

    <?php 
        include('tpl/footer.tpl');
        include('tpl/scripts.tpl');
        include('tpl/modal.tpl');
    ?>
    
    <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/plugin/datatables/i18n/spanish.js"></script>
    
    <script src="js/plugin/maxlength/bootstrap-maxlength.min.js"></script>
    <script src="js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="js/plugin/clockpicker/clockpicker.min.js"></script>
    <script src="js/plugin/bootstrap-tags/bootstrap-tagsinput.min.js"></script>
    <script src="js/plugin/noUiSlider/jquery.nouislider.min.js"></script>
    <script src="js/plugin/ion-slider/ion.rangeSlider.min.js"></script>
    <script src="js/plugin/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="js/plugin/knob/jquery.knob.min.js"></script>
    <script src="js/plugin/x-editable/moment.min.js"></script>
    <script src="js/plugin/x-editable/jquery.mockjax.min.js"></script>
    <script src="js/plugin/x-editable/x-editable.min.js"></script>
    <script src="js/plugin/typeahead/typeahead.min.js"></script>
    <script src="js/plugin/typeahead/typeaheadjs.min.js"></script>
    
    <script src="js/esquemas.js"></script>

</body>
</html>