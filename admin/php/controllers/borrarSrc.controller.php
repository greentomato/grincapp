<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$data = explode('/', $_POST['src']);
if ($table = Doctrine::getTable($_POST['tabla'])->findOneBy($_POST['columna'], end($data))) {
    $table[$_POST['columna']] = '';
    $table->save();
}
$src = str_replace(URL, INC, $_POST['src']);
@unlink($src);
@unlink(str_replace('thumb/', '', $src));
?>
