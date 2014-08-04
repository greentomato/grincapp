<?php
if (!defined('INC')) include('../includes/definer.php');
if (!defined('BOOTSTRAP')) include(INC.'admin/php/bootstrap.php');

$userSelection = $_SESSION['userSelection'];
$esquemas = Doctrine_Query::create()
        ->select('esq.value, esq.descripcion, esq.imagen, esq.slug')
        ->from('Esquema esq')
        ->innerJoin('esq.especies e')
        ->innerJoin('e.espacios as esp WITH esp.slug = ?', $_GET['espacio'])
        ->innerJoin('e.zonas as z WITH z.id = ?', $userSelection['zona'])
        ->innerJoin('e.dimensiones as d WITH d.id = ?', $userSelection['dimension'])
        ->innerJoin('e.soles as s WITH s.id = ?', $userSelection['sol'])
        ->innerJoin('e.regiones as r')
        ->whereIn('r.id', $userSelection['regiones'])
        ->execute(array(), Doctrine::HYDRATE_ARRAY)
;
$userSelection['espacio'] = $_GET['espacio'];
$_SESSION['userSelection'] = $userSelection;

$html = '';
$esquemaBoxTpl = file_get_contents(INC.'tpl/esquema-box.tpl');
include(INC.'php/replacers/esquemas.replacer.php');
echo($html);
?>