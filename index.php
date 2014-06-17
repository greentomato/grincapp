<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    
<?php $view = $_GET['view']; ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Grinc App</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">Estas usando un navegador <strong>desactualizado</strong>. Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> para mejorar la experiencia.</p>
        <![endif]-->

        <!-- HEADER -->

    <header>
        <a href="?view=1">
        <img class="brand" src="img/grinc-logo.svg" alt="Grinc"><h1>GrincApp</h1>
        </a>
    </header>

<!-- MAIN CONTENT -->
    <main role="main">
        <?php if($view == "1") include('common/1-text.php');?>
        <?php if($view == "2") include('common/2-text.php');?>
        <?php if($view == "3" or $view == "4") include('common/3-text.php');?>
        <?php if($view == "5" or $view == "6") include('common/4-text.php');?>
        
        <?php if($view == "1") include('common/results-placeholder.php');?> 
        <?php if($view == "2") include('common/listado-espacios.php');?>
        <?php if($view == "3" or $view == "4") include('common/listado-esquemas.php');?>
        <?php if($view == "5" or $view == "6") include('common/esquema-individual.php');?>

        
    </main>
    
    <!-- SIDEBAR -->
    <aside>
    <?php if($view == "1" or $view == "2") include('common/form-ubicacion.php');?>

    <?php if($view == "3" or $view == "4") include('common/listado-especies.php');?>

    <?php if($view == "5" or $view == "6") include('common/listado-especies-esquema.php');?>
    

    </aside>

    <?php if($view == "4" or $view == "6") include('common/especie-individual.php');?>

<!-- FOOTER -->
<footer>
    <p>2014 Grinc. Todos los derechos reservados.</p>
</footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>

        <script>
        $(document).ready(function() {
            $('.tooltip').tooltipster({
                delay: 0,
                maxWidth: 240,
                iconTouch: true,
                // offsetY: -1,
                position: 'right',
                
            });
        });
        </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
