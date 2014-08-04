<?php
for ($i=0, $l=count($esquemas); $i<$l; $i++) {
    $html .= $esquemaBoxTpl;
    $html = str_replace('${slug}', $esquemas[$i]['slug'], $html);
    $html = str_replace('${value}', $esquemas[$i]['value'], $html);
    $html = str_replace('${descripcion}', $esquemas[$i]['descripcion'], $html);
    $html = str_replace('${imagen}', $esquemas[$i]['imagen'], $html);
}
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>