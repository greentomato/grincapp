<?php
if (!defined('INC')) include('../includes/definer.php');
if (!defined('BOOTSTRAP')) include(INC.'admin/php/bootstrap.php');

$userSelection = $_SESSION['userSelection'];
$esquema = Doctrine::getTable('esquema')->findOneBySlug($_GET['esquema']);

$html = file_get_contents(INC.'tpl/esquema.tpl');
include(INC.'php/replacers/esquema.replacer.php');
echo($html);
?>