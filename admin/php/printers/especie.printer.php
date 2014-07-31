<?php
include_once(INC.'php/clases/Archivo.php');
include(INC.'php/bootstrap.php');
$html = Archivo::leer(INC.'tpl/especie.tpl');
$tagHtml = Archivo::leer(INC.'tpl/tag-item.tpl');

$tipoTags = Doctrine_Query::create()
        ->select('tg.id, tg.value, tg.has_descripcion, tg.has_nivel, tg.icon')
        ->from('TipoTag tg')
        ->orderBy('tg.value')
        ->execute(array(), Doctrine::HYDRATE_ARRAY)
;


if (isset($_GET['slug'])) {
    $especie = Doctrine::getTable('especie')->findOneBySlug($_GET['slug']);
    if ($especie && $especie->estado) {
        $accion = 'Editar';
        $icon = 'pencil';
        include(INC.'php/replacers/especie.full.replacer.php');
    } else {
        $html = Archivo::leer('tpl/error-404.tpl');
    }
} else {
    $accion = 'Cargar';
    $icon = 'plus';
    include(INC.'php/replacers/especie.void.replacer.php');
}
echo($html);
?>
