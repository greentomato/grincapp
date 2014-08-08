<?php
if (!defined('INC')) include('../includes/definer.php');
if (!defined('BOOTSTRAP')) include(INC.'admin/php/bootstrap.php');
if (!isset($especies)) {
    $userSelection = $_SESSION['userSelection'];
    $especies = Doctrine_Query::create()
            ->select('e.slug, e.nombre, e.denominacion, i.src as imagen')
            ->from('Especie e')
            ->leftJoin('e.imagen as i')
            ->innerJoin('e.espacios as esp WITH esp.slug = ?', $userSelection['espacio'])
            ->innerJoin('e.zonas as z WITH z.id = ?', $userSelection['zona'])
            ->innerJoin('e.dimensiones as d WITH d.id = ?', $userSelection['dimension'])
            ->innerJoin('e.soles as s WITH s.id = ?', $userSelection['sol'])
            ->innerJoin('e.regiones as r')
            ->whereIn('r.id', $userSelection['regiones'])
            ->execute(array(), Doctrine::HYDRATE_ARRAY)
    ;
    if (isset($_GET['esquema'])) {
        $nativaListTitle = 'Esquema '.Doctrine::getTable('esquema')->findOneBySlug($_GET['esquema'])->value;
    } else{
        $nativaListTitle = Doctrine::getTable('espacio')->findOneBySlug($userSelection['espacio'])->value;
    }
}
$html = file_get_contents(INC.'tpl/listado-especies.tpl');
$natviaListItemTpl = file_get_contents(INC.'tpl/nativa-list-item.tpl');
include(INC.'php/replacers/listadoEspecies.replacer.php');
echo($html);
?>