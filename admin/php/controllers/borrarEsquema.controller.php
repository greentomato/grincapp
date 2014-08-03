<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$esquema = Doctrine::getTable('esquema')->find($_POST['id']);
if ($esquema->imagen) {
    @unlink(INC.'../content/tmp/esquemas'.$esquema->imagen);
    @unlink(INC.'../content/tmp/esquemas/thumb'.$esquema->imagen);
}
foreach ($esquema->bloquesOrdenados() as $bloque) {
    @unlink(INC.'../content/esquema/'.$bloque['src']);
    @unlink(INC.'../content/esquema/thumb/'.$bloque['src']);
}
$esquema->bloques->delete();
$esquema->desvincular('RelEspecieEsquema');
$esquema->desvincular('RelEspacioEsquema');
$esquema->delete();
?>
