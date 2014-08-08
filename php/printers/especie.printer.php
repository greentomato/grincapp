<?php
if (!defined('INC')) include('../includes/definer.php');
if (!defined('BOOTSTRAP')) include(INC.'admin/php/bootstrap.php');
$especie = Doctrine::getTable('especie')->findOneBySlug($_GET['especie']);

$html = file_get_contents(INC.'tpl/especie-individual.tpl');
$tagTpl = file_get_contents(INC.'tpl/tag.tpl');
include(INC.'php/replacers/especie.replacer.php');
echo($html);
?>