<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');

if ($_POST['id']) {
    $esquema = Doctrine::getTable('esquema')->find($_POST['id']);
    if (isset($_POST['bloquesId'])) Doctrine_Query::create()->delete('Imagen')->where('id_esquema = ? ', $_POST['id'])->andWhereNotIn('id', $_POST['bloquesId'])->execute();
} else {
    $esquema = new Esquema();
}
$esquema->value = $_POST['value'];
$esquema->descripcion = $_POST['descripcion'];
$esquema->save();

//especies
if (isset($_POST['especies'])) {
    $esquema->desvincular('RelEspecieEsquema');
    $relacionCollection = new Doctrine_Collection('RelEspecieEsquema');
    $especies = json_decode(str_replace("'", '"', $_POST['especies']));;
    foreach ($especies->ids as $id) {
        if ($id) {
            $n = new RelEspecieEsquema();
            $n->id_esquema = $esquema->id;
            $n->id_especie = $id;
            $relacionCollection[] = $n;
        }
    }
    $relacionCollection->save();
}

//BLOQUES
if (isset($_POST['bloquesId'])) {
    for ($i=0, $l= count($_POST['bloquesId']); $i<$l; $i++) {
        if ($_POST['bloquesId'][$i]!=0){
            $bloque = Doctrine::getTable('imagen')->find($_POST['bloquesId'][$i]);
            rename(INC.'../content/tmp/esquemas/'.$bloque->src, INC.'../content/esquemas/'.$bloque->src);
            rename(INC.'../content/tmp/esquemas/thumb/'.$bloque->src, INC.'../content/esquemas/thumb/'.$bloque->src);
        } else {
            $bloque = new Imagen();
        }
        $bloque->titulo = $_POST['bloquesValue'][$i];
        $bloque->descripcion = $_POST['bloquesDescripcion'][$i];
        $bloque->orden = $i;
        $esquema->bloques[] = $bloque;
    }
}


//imagen
foreach (glob(INC.'../content/tmp/esquemas/'.$_POST['imgprefix'].'-*') as $img) {
    $imageName = str_replace(INC.'../content/tmp/esquemas/', '', $img);
    $ext = explode('.', $imageName);
    $esquema->imagen = $esquema->slug.'.'.end($ext);
    rename($img, INC.'../content/esquemas/'.$esquema->slug.'.'.end($ext));
    rename(INC.'../content/tmp/esquemas/thumb/'.$imageName, INC.'../content/esquemas/thumb/'.$esquema->slug.'.'.end($ext));
}

$esquema->save();

$accion = ($_POST['id'])?'#edit':'#new';
header('location: '.URL.'esquemas'.$accion);
?>