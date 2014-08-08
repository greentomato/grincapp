<?php
$back = (isset($back))?$back:$_SERVER['HTTP_REFERER'];

$especiesHtml = '';
for ($i=0, $l=count($especies); $i<$l; $i++) {
    $especiesHtml .= $natviaListItemTpl;
    $especiesHtml = str_replace('${slug}', $especies[$i]['slug'], $especiesHtml);
    $especiesHtml = str_replace('${nombre}', htmlentities($especies[$i]['nombre']), $especiesHtml);
    $especiesHtml = str_replace('${denominacion}', htmlentities($especies[$i]['denominacion']), $especiesHtml);
    $especiesHtml = str_replace('${imagen}', $especies[$i]['imagen'], $especiesHtml);
}

$html = str_replace('${espacio}', htmlentities($nativaListTitle), $html);
$html = str_replace('${back}', $back, $html);
$html = str_replace('${especies}', $especiesHtml, $html);
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>