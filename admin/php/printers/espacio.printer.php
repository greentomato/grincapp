<?php
include_once(INC.'php/clases/Archivo.php');
include(INC.'php/bootstrap.php');
$html = Archivo::leer(INC.'tpl/espacio.tpl');
if (isset($_GET['slug'])) {
    if ($espacio = Doctrine::getTable('espacio')->findOneBySlug($_GET['slug'])) {
        $accion = 'Editar';
        $icon = 'pencil';
        $especiesSelected = Doctrine_Query::create()
                ->select('e.id as id')
                ->from('Especie e')
                ->innerJoin('e.espacios as e2 WITH e2.id = ?', $espacio->id)
                ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
        if (!is_array($especiesSelected)) $especiesSelected = array($especiesSelected);
        $especiesSelected = '['.implode(',', $especiesSelected).']';
        include(INC.'php/replacers/espacio.full.replacer.php');
    } else {
        $html = Archivo::leer('tpl/error-404.tpl');
    }
} else {
    $accion = 'Cargar';
    $icon = 'plus';
    $especiesSelected = '[]';
    include(INC.'php/replacers/espacio.void.replacer.php');
}
echo($html);
?>
