<?php
include('../includes/definer.php');
include('../bootstrap.php');
$imagen = Doctrine::getTable('imagen')->find($_POST['id']);
@unlink(INC.'../content/esquema/'.$imagen->src);
@unlink(INC.'../content/esquema/thumb/'.$imagen->src);
$imagen->delete();
?>
