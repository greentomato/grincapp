<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');

if ($_POST['id']) {
    $espacio = Doctrine::getTable('espacio')->find($_POST['id']);
    $espacio->desvincular('RelEspacioEsquema');
} else {
    $espacio = new Espacio();
}
$espacio->value = $_POST['value'];
$espacio->descripcion = $_POST['descripcion'];
$espacio->save();

//esquemas
if (isset($_POST['esquemas'])) {
    $q = Doctrine_Query::create()->select('n.*')->from('esquema n')->whereIn('n.id', $_POST['esquemas'])->execute();
    for ($i=0, $l=$q->count(); $i<$l; $i++) {
        $espacio->esquemas[] = $q[$i];
    }
}

//IMAGEN
foreach (glob(INC.'../content/tmp/espacios/'.$_POST['imgprefix'].'-*') as $img) {
    $imageName = str_replace(INC.'../content/tmp/espacios/', '', $img);
    $ext = explode('.', $imageName);
    $espacio->imagen = $espacio->slug.'.'.end($ext);
    rename($img, INC.'../content/espacios/'.$espacio->slug.'.'.end($ext));
    rename(INC.'../content/tmp/espacios/thumb/'.$imageName, INC.'../content/espacios/thumb/'.$espacio->slug.'.'.end($ext));
}

$espacio->save();

if (isset($_POST['redirect'])) {
    $accion = ($_POST['id'])?'#edit':'#new';
    //header('location: '.URL.'espacio'.$accion);
}
?>