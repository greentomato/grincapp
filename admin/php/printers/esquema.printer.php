<?php
include_once(INC.'php/clases/Archivo.php');
include(INC.'php/bootstrap.php');
$html = Archivo::leer(INC.'tpl/esquema.tpl');
if (isset($_GET['slug'])) {
    if ($esquema = Doctrine::getTable('esquema')->findOneBySlug($_GET['slug'])) {
        $accion = 'Editar';
        $icon = 'pencil';
        $tplBloque = Archivo::leer(INC.'tpl/bloque-item.tpl');
        include(INC.'php/replacers/esquema.full.replacer.php');
    } else {
        $html = Archivo::leer('tpl/error-404.tpl');
    }
} else {
    $accion = 'Cargar';
    $icon = 'plus';
    include(INC.'php/replacers/esquema.void.replacer.php');
}
echo($html);
?>
