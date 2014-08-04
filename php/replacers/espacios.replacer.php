<?php
for ($i=0, $l=count($espacios); $i<$l; $i++) {
    $html .= $spaceBoxTpl;
    $html = str_replace('${slug}', $espacios[$i]['slug'], $html);
    $html = str_replace('${value}', $espacios[$i]['value'], $html);
    $html = str_replace('${descripcion}', $espacios[$i]['descripcion'], $html);
    $html = str_replace('${imagen}', $espacios[$i]['imagen'], $html);
}
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>