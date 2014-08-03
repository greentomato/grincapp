<?php
$html = str_replace('${accion}', $accion, $html);
$html = str_replace('${icon}', $icon, $html);
$html = str_replace('${id}', $region->id, $html);
$html = str_replace('${title}', $region->value, $html);
$html = str_replace('${value}', $region->value, $html);
$html = str_replace('${polygon}', $region->polygon, $html);
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>