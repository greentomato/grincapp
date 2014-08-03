<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$region = Doctrine::getTable('region')->find($_POST['id']);
$region->desvincular('RelEspecieRegion');
$region->delete();
?>
