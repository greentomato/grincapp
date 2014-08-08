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
            <?php include('php/printers/esquema.printer.php') ?>
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
                $('body').on('click', '.closeNativaDataBox', function (event) {
                    event.preventDefault();
                    $('.nativaDataBoxShadow, .nativaDataBox').remove();
                })
                $('.tooltip').tooltipster({
                    delay: 0,
                    maxWidth: 240,
                    iconTouch: true,
                    // offsetY: -1,
                    position: 'right'
                });
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
            });
        </script>

    </body>
</html>
