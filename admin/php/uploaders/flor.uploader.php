<?php
if(!isset($_FILES) || !count($_FILES)) exit();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
include_once(INC.'php/clases/FileImage.php');


$relativePath = '../content/tmp/especies/';
$ruta = INC.$relativePath;
$response = array();

//validaciones
for ($i=0, $l=count($_FILES['files']['name']); $i<$l; $i++) {
    $nombre = 'flor-'.$_POST['imgprefix'].'-'.time().rand(1, 99);
    
    $ext = explode('.', $_FILES['files']['name'][$i]);
    $ext = '.'.$ext[count($ext)-1];
    $ext = strtolower($ext);
    $ext = ($ext == '.jpeg')?'.jpg':$ext;
    
    if ($ext == '.jpg' || $ext == '.jpeg' || $ext == '.gif' || $ext == '.png' ) {

        //dimensionamiento y creacion de las imagenes
        $fileImage = new FileImage($_FILES['files']['tmp_name'][$i]);
        $fileImage->ajustarAncho(597);
        $fileImage->save($ruta.$nombre);
        
        $fileImage = new FileImage($_FILES['files']['tmp_name'][$i]);
        $fileImage->escalar(256, 256);
        $fileImage->recortarDesdeElCentro(256, 256);
        $fileImage->save($ruta.'thumb/'.$nombre);

        //respuesta
        $response[] = array(
            'src'=>$relativePath.'thumb/'.$nombre.'.'.$fileImage->extension
        );
    }
}

header("Content-type: application/json");
echo(json_encode($response));
?>
