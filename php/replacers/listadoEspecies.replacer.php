<?php
$http = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($http, 'espacio') !== FALSE) {
    $url = preg_replace('#espacio/([0-9a-zA-Z-_]+)(.*)?#', 'espacio/$1', $http);
} else {
    $url = preg_replace('#esquema/([0-9a-zA-Z-_]+)(.*)?#', 'esquema/$1', $http);
}

$html = str_replace('${espacio}', $espacio['value'], $html);
$html = str_replace('${back}', $url, $html);

for ($i=0, $l=count($especies); $i<$l; $i++) {
    $html .= $natviaListItemTpl;
    $html = str_replace('${url}', $url, $html);
    $html = str_replace('${slug}', $especies[$i]['slug'], $html);
    $html = str_replace('${nombre}', $especies[$i]['nombre'], $html);
    $html = str_replace('${denominacion}', $especies[$i]['denominacion'], $html);
    $html = str_replace('${imagen}', $especies[$i]['imagen'], $html);
}

$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>