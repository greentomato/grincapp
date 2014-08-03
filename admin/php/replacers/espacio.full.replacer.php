<?php
$html = str_replace('${accion}', $accion, $html);
$html = str_replace('${icon}', $icon, $html);
$html = str_replace('${imgprefix}', time() . '' . rand(1, 99999), $html);
$html = str_replace('${id}', $espacio->id, $html);
$html = str_replace('${title}', $espacio->value, $html);
$html = str_replace('${value}', $espacio->value, $html);
$html = str_replace('${descripcion}', $espacio->descripcion, $html);
$html = str_replace('${imagen}', ($espacio->imagen)?URL.'../content/espacios/thumb/'.$espacio->imagen:'img/uploader-background.jpg', $html);
$html = str_replace('${src}', ($espacio->imagen)?URL.'../content/espacios/thumb/'.$espacio->imagen:'img/uploader-background.jpg', $html);
$html = str_replace('${esquemaToCheckbox}', Esquema::toCheckbox($espacio), $html);
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>