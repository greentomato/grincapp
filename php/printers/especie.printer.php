<?php
if (!defined('INC')) include('../includes/definer.php');
if (!defined('BOOTSTRAP')) include(INC.'admin/php/bootstrap.php');

$q = Doctrine_Query::create()
        ->select('e.*')
        ->from('Especie e')
        ->innerJoin('e.espacios as esp WITH esp.slug = ?', $userSelection['espacio'])
        ->innerJoin('e.zonas as z WITH z.id = ?', $userSelection['zona'])
        ->innerJoin('e.dimensiones as d WITH d.id = ?', $userSelection['dimension'])
        ->innerJoin('e.soles as s WITH s.id = ?', $userSelection['sol'])
        ->innerJoin('e.regiones as r')
        ->whereIn('r.id', $userSelection['regiones'])
;
if (isset($_GET['esquema'])) $q->innerJoin('e.esquemas as esq WITH esq.slug = ?', $_GET['esquema']) ;
if (isset($_GET['especie'])) $q->andWhere('e.slug = ?', $_GET['especie']) ;

$especie = $q->fetchOne();

$html = file_get_contents(INC.'tpl/especie-individual.tpl');
$tagTpl = file_get_contents(INC.'tpl/tag.tpl');
include(INC.'php/replacers/especie.replacer.php');
echo($html);
?>