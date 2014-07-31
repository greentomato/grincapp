<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$especie = Doctrine::getTable('especie')->find($_POST['id']);
$especie->estado = 0;
$especie->save();
?>
