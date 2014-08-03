<?php
include('../includes/definer.php');
include(INC.'php/bootstrap.php');

$region = ($_POST['id'])?Doctrine::getTable('region')->find($_POST['id']):new Region();
$region->value = $_POST['value'];
$region->polygon = $_POST['polygon'];
$region->save();

//header('location: '.URL.'especie'.$accion);
?>