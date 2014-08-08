<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');

if ($_POST['id']) {
    $espacio = Doctrine::getTable('espacio')->find($_POST['id']);
    $espacio->desvincular('RelEspecieEspacio');
} else {
    $espacio = new Espacio();
}
$espacio->value = $_POST['value'];
$espacio->descripcion = $_POST['descripcion'];
$espacio->save();

//especies
if (isset($_POST['especies'])) {
    $relacionCollection = new Doctrine_Collection('RelEspecieEspacio');
    $especies = json_decode(str_replace("'", '"', $_POST['especies']));;
    foreach ($especies->ids as $id) {
        if ($id) {
            $n = new RelEspecieEspacio();
            $n->id_espacio = $espacio->id;
            $n->id_especie = $id;
            $relacionCollection[] = $n;
        }
    }
    $relacionCollection->save();
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

$accion = ($_POST['id'])?'#edit':'#new';
header('location: '.URL.'espacios'.$accion);
?>