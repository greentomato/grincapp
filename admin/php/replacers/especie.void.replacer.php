<?php
$html = str_replace('${accion}', $accion, $html);
$html = str_replace('${icon}', $icon, $html);
$html = str_replace('${imgprefix}', time() . '' . rand(1, 99999), $html);
$html = str_replace('${title}', 'Nueva Especie', $html);
$html = str_replace('${imagen}', 'img/uploader-background.jpg', $html);
$html = str_replace('${flor}', 'img/uploader-background.jpg', $html);
$html = str_replace('${escala}', 'img/uploader-background.jpg', $html);
$html = str_replace('${zonaToCheckbox}', Zona::toCheckbox(), $html);
$html = str_replace('${dimensionToCheckbox}', Dimension::toCheckbox(), $html);
$html = str_replace('${solToCheckbox}', Sol::toCheckbox(), $html);
$html = str_replace('${espacioToCheckbox}', Espacio::toCheckbox(), $html);
$html = str_replace('${esquemaToCheckbox}', Esquema::toCheckbox(), $html);
$html = str_replace('${regionToSelect}', Region::toSelect(), $html);

$tags = '';
for ($i=0, $l=count($tipoTags); $i<$l; $i++) {
    $tags .= $tagHtml;
    if (!$tipoTags[$i]['has_descripcion']) $tags = str_replace('${visible-descripcion}', 'hidden', $tags);
    if (!$tipoTags[$i]['has_nivel']) $tags = str_replace('${visible-nivel}', 'hidden', $tags);
    $tags = str_replace('${icon}', $tipoTags[$i]['icon'], $tags);
    $tags = str_replace('${value}', $tipoTags[$i]['value'], $tags);
    $tags = str_replace('${id}', $tipoTags[$i]['id'], $tags);
    $tags = preg_replace('/\${*[A-Za-z0-9_-]*\}*/', '', $tags);
}
$html = str_replace('${tags}', $tags, $html);
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>