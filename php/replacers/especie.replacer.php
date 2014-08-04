<?php
$http = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($http, 'espacio') !== FALSE) {
    $url = preg_replace('#espacio/([0-9a-zA-Z-_]+)(.*)?#', 'espacio/$1', $http);
} else {
    $url = preg_replace('#esquema/([0-9a-zA-Z-_]+)(.*)?#', 'esquema/$1', $http);
}

$html = str_replace('${nombre}', $especie['nombre'], $html);
$html = str_replace('${denominacion}', $especie['denominacion'], $html);
$html = str_replace('${back}', $url, $html);

if ($especie->imagen->id) $html = str_replace('${imagen}', $especie->imagen->src, $html);

$ranges = array(0, 'Bajo', 'Bajo', 'Medio', 'Alto', 'Alto');
$tags = $especie->tags;
$tagsHtml = '';
$observacion = '';
if ($tags->count()) {
    foreach ($tags as $tag) {
        if ($tag->prototag->tipo->value == 'Observaciones' && $especie->flor->id) {
            $tagsHtml .= '
                <div class="nativaDataItem tooltip" title="La flor que identifica a esta especie.">
                    <h3><i class="fa fa-pagelines"></i>Flor destacada</h3>
                    <img class="nativeFlower" src="content/especies/'.$especie->flor->src.'" alt="flor-carquejilla">
                </div>';
        }
        
        $tagsHtml .= $tagTpl;
        if ($tag->descripcion !== NULL) {
            $tagsHtml = str_replace('${descripcion}', $tag->descripcion, $tagsHtml);
        } else {
            $tagsHtml = str_replace('${hasDescripcion}', 'hidden', $tagsHtml);
        }
        if ($tag->nivel !== NULL) {
            $fullDots = str_repeat('<i class="fa fa-circle"></i>', $tag->nivel);
            $emptyDots = str_repeat('<i class="fa fa-circle-o"></i>', 5-$tag->nivel);
            /*$tagsHtml = str_replace('${rangeClass}', 'range'.$range[$tag->nivel], $tagsHtml);
            $tagsHtml = str_replace('${range}', $range[$tag->nivel], $tagsHtml);*/
            $tagsHtml = str_replace('${rangeClass}', 'range'.$ranges[$tag->nivel], $tagsHtml);
            $tagsHtml = str_replace('${range}', $ranges[$tag->nivel], $tagsHtml);
            $tagsHtml = str_replace('${nivel}', $fullDots.$emptyDots, $tagsHtml);
        } else {
            $tagsHtml = str_replace('${hasNivel}', 'hidden', $tagsHtml);
        }
        $tagsHtml = str_replace('${icon}', $tag->prototag->tipo->icon, $tagsHtml);
        $tagsHtml = str_replace('${value}', $tag->prototag->tipo->value, $tagsHtml);
        $tagsHtml = str_replace('${tooltip}', $tag->prototag->tooltip, $tagsHtml);
        $tagsHtml = preg_replace('/\${*[A-Za-z0-9_-]*\}*/', '', $tagsHtml);
    }
}
$html = str_replace('${tags}', $tagsHtml, $html);
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>