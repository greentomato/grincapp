<?php
include('php/includes/definer.php');
if (!defined('BOOTSTRAP')) include(INC.'admin/php/bootstrap.php');
$especies = Doctrine_Query::create()
        ->select('e.slug, e.nombre, e.denominacion, i.src as imagen')
        ->from('Especie e')
        ->innerJoin('e.imagen i')
        ->execute(array(), Doctrine::HYDRATE_ARRAY);
$nativaListTitle = 'Listado general de especies';
$back = URL;
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
                <h2>Bienvenido a Grinc.</h2>
                <h4>Plantar especies nativas de plantas, es el primer paso para recuperar tu ambiente natural. Encontr&aacute; qu&eacute; y como plantar seg&uacute;n d&oacute;nde estes.</h4>
            </hgroup>
            <!-- RESULTS PLACEHOLDER --> 
            <div class="resultsPlaceholder">
                <h3>Complet&aacute; el formulario para ver espacios para restauraci&oacute;n ambiental sugeridos </h3>
                <p>Por el momento solo contamos con informaci&oacute;n para la Provincia de Buenos Aires. Estamos trabajando para incluir a todo el pa&iacute;s.</p>
            </div>

            <div class="callToActionArrow">
                <!-- <img src="img/hand-drawn-arrow-green.svg" alt="Complet&aacute; el formulario"> -->
            </div>
        </main>

        <!-- SIDEBAR -->
        <aside>
            <?php include('php/printers/listadoEspecies.printer.php'); ?>
        </aside>

        <?php
            include('php/printers/especie.printer.php');
            include('tpl/footer.tpl');
            include('tpl/scripts.tpl');
        ?>
        
        <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
        <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
        <script>
            $(document).ready(function() {
                $('body').on('click', '.closeNativaDataBox', function (event) {
                    window.location = BASE_URL;
                })
                $('.nativaList a').click(function (event) {
                    event.preventDefault();
                    var slug = $(this).attr('href').replace('especie/', '');
                    $.ajax({
                        type:'get',
                        url: BASE_URL+'php/printers/especie.printer.php',
                        data:{especie: slug},
                        success: function (data) {
                            if ($('.nativaDataBoxShadow').length) {
                                $('.nativaDataBoxShadow, .nativaDataBox').remove();
                            }
                            $('body > aside').after(data)
                        }
                    })
                })
                var currentPlace;
                //error tooltip
                $('.error-tooltip').tooltipster({
                    delay: 0,
                    maxWidth: 240,
                    iconTouch: true,
                    trigger: ''
                })
                $('#search').focus(function () {
                    $('#search').tooltipster('hide');
                })
                $('input[name="zona"], input[name="dimension"], input[name="sol"]').change(function () {
                    $('#label-'+$(this).attr('name')).tooltipster('hide');
                })
                //fin error tooltip
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
                        $('#search').tooltipster('show');
                        
                    } else if (!$('input[name="zona"]:checked').length) {
                        $('#label-zona').tooltipster('show');
                    } else if (!$('input[name="dimension"]:checked').length) {
                        $('#label-dimension').tooltipster('show');
                    } else if (!$('input[name="sol"]:checked').length) {
                        $('#label-sol').tooltipster('show');
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
