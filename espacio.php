<?php
    include('php/includes/definer.php');
    include('php/checkers/espacio.checker.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    
    <head>
        <base href="<?php echo(URL); ?>">
        <title>Grinc App</title>
        <?php include('tpl/head.tpl'); ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">Estas usando un navegador <strong>desactualizado</strong>. Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> para mejorar la experiencia.</p>
        <![endif]-->

       <?php include('tpl/header.tpl'); ?>

        <!-- MAIN CONTENT -->
        <main role="main">
            <hgroup>
                <h2>Esquemas de plantaci&oacute;n</h2>
                <h4>Eleg&iacute; la forma con la que quer&eacute;s armar tu jard&iacute;n</h4>
            </hgroup>
            <!-- SPACES RESULTS --> 
            <div class="spacesResultBox">
                <ul>
                    <?php include('php/printers/esquemas.printer.php') ?>
                </ul>
            </div>
        </main>

        <!-- SIDEBAR -->
        <aside>
            <?php include('php/printers/listadoEspecies.printer.php'); ?>
        </aside>

        <?php
            if(isset($_GET['especie'])) include('php/printers/especie.printer.php');
            include('tpl/footer.tpl');
            include('tpl/scripts.tpl');
        ?>
        
        <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.tooltip').tooltipster({
                    delay: 0,
                    maxWidth: 240,
                    iconTouch: true,
                    // offsetY: -1,
                    position: 'right'
                });
            });
        </script>

    </body>
</html>
