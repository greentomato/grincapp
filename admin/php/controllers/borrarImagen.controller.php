<?php
include('../includes/definer.php');
include('../bootstrap.php');
$imgArray = explode('/', $_POST['src']);
if ($_POST['type'] == 'imagen') {
    if ($especie = Doctrine::getTable('especie')->findOneByImagen(end($imgArray))) {
        $especie->imagen= '';
        $especie->save();
    }
}
if ($_POST['type'] == 'flor') {
    if ($especie = Doctrine::getTable('especie')->findOneByFlor(end($imgArray))) {
        $especie->flor= '';
        $especie->save();
    }
}
@unlink(INC.$_POST['src']);
@unlink(INC.str_replace('thumb/', '', $_POST['src']));
?>
