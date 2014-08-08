<?php
$html = str_replace('${accion}', $accion, $html);
$html = str_replace('${icon}', $icon, $html);
$html = str_replace('${imgprefix}', time() . '' . rand(1, 99999), $html);
$html = str_replace('${title}', 'Nuevo Espacio', $html);
$html = str_replace('${imagen}', 'img/uploader-background.jpg', $html);
$html = str_replace('${esquemaToCheckbox}', Esquema::toCheckbox(), $html);
$html = str_replace('${especiesSelected}', $especiesSelected, $html);
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>