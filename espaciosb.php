<?php
    include('php/includes/definer.php');
    include('php/checkers/espacios.checker.php');
    $currentPlace = isset($_POST['location'])?$_POST['location']:'';
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
                <h2>Espacios disponibles</h2>
                <h4>Eleg&iacute; el espacio que te interesa conocer para ver mas informaci&oacute;n sobre esquemas de plantaci&oacute;n.</h4>
            </hgroup>  
            <!-- SPACES RESULTS --> 
            <div class="spacesResultBox">
                <ul>
                    <?php include('php/printers/espacios.printer.php') ?>
                </ul>
            </div>
        </main>

        <!-- SIDEBAR -->
        <aside>
            <?php include('php/printers/formUbicacion.printer.php'); ?>
        </aside>

        <?php
            include('tpl/footer.tpl');
            include('tpl/scripts.tpl');
        ?>
        
        <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
        <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
        <script>
            $(document).ready(function() {
                var currentPlace = '<?php echo($currentPlace) ?>';
                $('.tooltip').tooltipster({
                    delay: 0,
                    maxWidth: 240,
                    iconTouch: true,
                    // offsetY: -1,
                    position: 'right'
                });
                $('#search').bind('keypress', function(e) {
                    if(e.keyCode==13) e.preventDefault();
                });
                $('#form-ubicacion a.asideSubmit').click(function (event) {
                    event.preventDefault();
                    if (!currentPlace) {
                        alert('Tenés que indicar tu ubicación');
                    } else if (!$('input[name="zona"]:checked').length) {
                        alert('Tenés que indicar el tipo de zona');
                    } else if (!$('input[name="dimension"]:checked').length) {
                        alert('Tenés que indicar la dimensión');
                    } else if (!$('input[name="sol"]:checked').length) {
                        alert('Tenés que indicar la cantidad de sol');
                    } else {
                        $('#form-ubicacion input[name="location"]').val(currentPlace)
                        $('#form-ubicacion').submit();
                    }
                })
                Geolocation.initialize('search', function (data) {
                    currentPlace = data.getPlace().geometry.location.toString();
                })
            });
        </script>

    </body>
</html>
