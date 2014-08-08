<?php
include_once(INC.'php/clases/Archivo.php');
include(INC.'php/bootstrap.php');
$html = Archivo::leer(INC.'tpl/region.tpl');
if (isset($_GET['slug'])) {
    if ($region = Doctrine::getTable('region')->findOneBySlug($_GET['slug'])) {
        $accion = 'Editar';
        $icon = 'pencil';
        $especiesSelected = Doctrine_Query::create()
                ->select('e.id as id')
                ->from('Especie e')
                ->innerJoin('e.regiones as r WITH r.id = ?', $region->id)
                ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
        if (!is_array($especiesSelected)) $especiesSelected = array($especiesSelected);
        $especiesSelected = '['.implode(',', $especiesSelected).']';
        include(INC.'php/replacers/region.full.replacer.php');
    } else {
        $html = Archivo::leer('tpl/error-404.tpl');
    }
} else {
    $accion = 'Cargar';
    $icon = 'plus';
    $especiesSelected = '[]';
    include(INC.'php/replacers/region.void.replacer.php');
}
echo($html);
?>
