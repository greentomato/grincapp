<?php
include('../includes/definer.php');
include(INC.'php/bootstrap.php');

$region = ($_POST['id'])?Doctrine::getTable('region')->find($_POST['id']):new Region();
$region->value = $_POST['value'];
$region->polygon = $_POST['polygon'];
$region->save();

//especies
if (isset($_POST['especies'])) {
    $region->desvincular('RelEspecieRegion');
    $relacionCollection = new Doctrine_Collection('RelEspecieRegion');
    $especies = json_decode(str_replace("'", '"', $_POST['especies']));;
    foreach ($especies->ids as $id) {
        if ($id) {
            $n = new RelEspecieRegion();
            $n->id_region = $region->id;
            $n->id_especie = $id;
            $relacionCollection[] = $n;
        }
    }
    $relacionCollection->save();
}

$accion = ($_POST['id'])?'#edit':'#new';
header('location: '.URL.'regiones'.$accion);
?>