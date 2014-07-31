<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');

if ($_POST['id']) {
    $especie = Doctrine::getTable('especie')->find($_POST['id']);
    Doctrine_Query::create()->delete('Tag')->where('id_especie = ?', $especie->id)->execute();
} else {
    $especie = new Especie();
}
$especie->nombre = $_POST['nombre'];
$especie->denominacion = $_POST['denominacion'];

//dimensiones
if (isset($_POST['dimensiones'])) {
    $especie->desvincular('RelEspecieDimension');
    $q = Doctrine_Query::create()->select('n.*')->from('dimension n')->whereIn('n.id', $_POST['dimensiones'])->execute();
    for ($i=0, $l=$q->count(); $i<$l; $i++) {
        $especie->dimensiones[] = $q[$i];
    }
}

//espacios
if (isset($_POST['espacios'])) {
    $especie->desvincular('RelEspecieEspacio');
    $q = Doctrine_Query::create()->select('n.*')->from('espacio n')->whereIn('n.id', $_POST['espacios'])->execute();
    for ($i=0, $l=$q->count(); $i<$l; $i++) {
        $especie->espacios[] = $q[$i];
    }
}

//esquemas
if (isset($_POST['esquemas'])) {
    $especie->desvincular('RelEspecieEsquema');
    $q = Doctrine_Query::create()->select('n.*')->from('esquema n')->whereIn('n.id', $_POST['esquemas'])->execute();
    for ($i=0, $l=$q->count(); $i<$l; $i++) {
        $especie->esquemas[] = $q[$i];
    }
}

//regiones
if (isset($_POST['regiones'])) {
    $especie->desvincular('RelEspecieRegion');
    $q = Doctrine_Query::create()->select('n.*')->from('region n')->whereIn('n.id', $_POST['regiones'])->execute();
    for ($i=0, $l=$q->count(); $i<$l; $i++) {
        $especie->regiones[] = $q[$i];
    }
}

//soles
if (isset($_POST['soles'])) {
    $especie->desvincular('RelEspecieSol');
    $q = Doctrine_Query::create()->select('n.*')->from('sol n')->whereIn('n.id', $_POST['soles'])->execute();
    for ($i=0, $l=$q->count(); $i<$l; $i++) {
        $especie->soles[] = $q[$i];
    }
}

//zonas
if (isset($_POST['zonas'])) {
    $especie->desvincular('RelEspecieZona');
    $q = Doctrine_Query::create()->select('n.*')->from('zona n')->whereIn('n.id', $_POST['zonas'])->execute();
    for ($i=0, $l=$q->count(); $i<$l; $i++) {
        $especie->zonas[] = $q[$i];
    }
}
$especie->save();

//tags
if (isset($_POST['tipotags'])) {
    
    $tagsCollection = new Doctrine_Collection('tag');
    for ($i=0, $l=count($_POST['tipotags']); $i<$l; $i++) {
        $q = Doctrine_Query::create()
                ->select('p.id')
                ->from('Prototag as p')
                ->innerJoin('p.tipo as tg')
                ->where('p.id_tipo = ?', $_POST['tipotags'][$i])
        ;
        if (isset($_POST['nivel-'.$_POST['tipotags'][$i]])) {
            $n = $_POST['nivel-'.$_POST['tipotags'][$i]];
            $nivel = ($n == 1 || $n == 2)?1:($n == 4 || $n == 5)?3:2;
            $q->addWhere('p.nivel = ?', $nivel);
        }
        $data = $q->fetchOne(array(), Doctrine::HYDRATE_ARRAY);
        $tag = new Tag();
        $tag->id_prototag = $data['id'];
        $tag->id_especie = $especie->id;
        if (isset($_POST['nivel-'.$_POST['tipotags'][$i]])) $tag->nivel = $_POST['nivel-'.$_POST['tipotags'][$i]];
        if (isset($_POST['descripcion-'.$_POST['tipotags'][$i]])) $tag->descripcion = $_POST['descripcion-'.$_POST['tipotags'][$i]];
        $tagsCollection[] = $tag;
    }
    /*
    $tags = Doctrine_Query::create()->select('t.id, t.value, t.icon, t.tooltip')->from('Tag t')->whereIn('t.id', $_POST['tagsids'])->execute();
    for ($i=0, $l=count($tags); $i<$l; $i++) {
        $tag = new Tag();
        $tag->value = $tags[$i]['value'];
        $tag->icon = $tags[$i]['icon'];
        $tag->tooltip = $tags[$i]['tooltip'];
        $tag->id_especie = $especie->id;
        if (isset($_POST['nivel-'.$tags[$i]['id']])) $tag->nivel = $_POST['nivel-'.$tags[$i]['id']];
        if (isset($_POST['descripcion-'.$tags[$i]['id']])) $tag->descripcion = $_POST['descripcion-'.$tags[$i]['id']];
    }
     * 
     */
}
$tagsCollection->save();

//IMAGENES
//flor
foreach (glob(INC.'../content/tmp/especies/flor-'.$_POST['imgprefix'].'-*') as $img) {
    $imageName = str_replace(INC.'../content/tmp/especies/', '', $img);
    $ext = explode('.', $imageName);
    $especie->flor = 'flor-'.$especie->slug.'.'.end($ext);
    $especie->save();
    rename($img, INC.'../content/especies/'.'flor-'.$especie->slug.'.'.end($ext));
    rename(INC.'../content/tmp/especies/thumb/'.$imageName, INC.'../content/especies/thumb/'.'flor-'.$especie->slug.'.'.end($ext));
}

//imagen
foreach (glob(INC.'../content/tmp/especies/'.$_POST['imgprefix'].'-*') as $img) {
    $imageName = str_replace(INC.'../content/tmp/especies/', '', $img);
    $ext = explode('.', $imageName);
    $especie->imagen = $especie->slug.'.'.end($ext);
    $especie->save();
    rename($img, INC.'../content/especies/'.$especie->slug.'.'.end($ext));
    rename(INC.'../content/tmp/especies/thumb/'.$imageName, INC.'../content/especies/thumb/'.$especie->slug.'.'.end($ext));
}

if (isset($_POST['redirect'])) {
    $accion = ($_POST['id'])?'#edit':'#new';
    //header('location: '.URL.'especie'.$accion);
}
?>