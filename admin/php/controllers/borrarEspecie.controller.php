<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$especie = Doctrine::getTable('especie')->find($_POST['id']);
if ($especie->id_imagen) {
    @unlink(INC.'../content/tmp/especies'.$especie->imagen->src);
    @unlink(INC.'../content/tmp/especies/thumb'.$especie->imagen->src);
}
if ($especie->id_flor) {
    @unlink(INC.'../content/tmp/especies'.$especie->flor->src);
    @unlink(INC.'../content/tmp/especies/thumb'.$especie->flor->src);
}
if ($especie->id_escala) {
    @unlink(INC.'../content/tmp/especies'.$especie->escala->src);
    @unlink(INC.'../content/tmp/especies/thumb'.$especie->escala->src);
}
$especie->desvincular('RelEspecieDimension');
$especie->desvincular('RelEspecieEspacio');
$especie->desvincular('RelEspecieEsquema');
$especie->desvincular('RelEspecieRegion');
$especie->desvincular('RelEspecieSol');
$especie->desvincular('RelEspecieZona');
$especie->desvincular('Tag');
$especie->delete();
?>
