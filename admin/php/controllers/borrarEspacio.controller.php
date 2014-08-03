<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$espacio = Doctrine::getTable('espacio')->find($_POST['id']);
if ($espacio->imagen) {
    @unlink(INC.'../content/tmp/espacios'.$espacio->imagen);
    @unlink(INC.'../content/tmp/espacios/thumb'.$espacio->imagen);
}
$espacio->desvincular('RelEspacioEsquema');
$espacio->desvincular('RelEspecieEspacio');
$espacio->delete();
?>
