<?php
include_once(INC.'php/clases/Archivo.php');
include(INC.'php/bootstrap.php');
$html = Archivo::leer(INC.'tpl/espacio.tpl');
if (isset($_GET['slug'])) {
    if ($espacio = Doctrine::getTable('espacio')->findOneBySlug($_GET['slug'])) {
        $accion = 'Editar';
        $icon = 'pencil';
        include(INC.'php/replacers/espacio.full.replacer.php');
    } else {
        $html = Archivo::leer('tpl/error-404.tpl');
    }
} else {
    $accion = 'Cargar';
    $icon = 'plus';
    include(INC.'php/replacers/espacio.void.replacer.php');
}
echo($html);
?>
