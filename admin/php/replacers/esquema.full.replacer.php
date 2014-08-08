<?php
$html = str_replace('${accion}', $accion, $html);
$html = str_replace('${icon}', $icon, $html);
$html = str_replace('${imgprefix}', time() . '' . rand(1, 99999), $html);
$html = str_replace('${id}', $esquema->id, $html);
$html = str_replace('${title}', $esquema->value, $html);
$html = str_replace('${value}', $esquema->value, $html);
$html = str_replace('${descripcion}', $esquema->descripcion, $html);
$html = str_replace('${imagen}', ($esquema->imagen)?URL.'../content/esquemas/thumb/'.$esquema->imagen:'img/uploader-background.jpg', $html);
$html = str_replace('${especiesSelected}', $especiesSelected, $html);

//bloques
$bloques = '';
$i=1;
foreach ($esquema->bloquesOrdenados() as $bloque) {
    $bloques .= $tplBloque;
    $bloques = str_replace('${i}', $i, $bloques);
    $bloques = str_replace('${id}', $bloque['id'], $bloques);
    $bloques = str_replace('${value}', $bloque['titulo'], $bloques);
    $bloques = str_replace('${descripcion}', $bloque['descripcion'], $bloques);
    $bloques = str_replace('${imagen}', ($bloque['src'])?URL.'../content/esquemas/thumb/'.$bloque['src']:'img/uploader-background.jpg', $bloques);
    $i++;
}
$html = str_replace('${bloques}', $bloques, $html);

$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>