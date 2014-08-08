<?php
$html = str_replace('${accion}', $accion, $html);
$html = str_replace('${icon}', $icon, $html);
$html = str_replace('${imgprefix}', time() . '' . rand(1, 99999), $html);
$html = str_replace('${id}', $especie->id, $html);
$html = str_replace('${title}', $especie->nombre, $html);
$html = str_replace('${nombre}', $especie->nombre, $html);
$html = str_replace('${denominacion}', $especie->denominacion, $html);
$html = str_replace('${imagen}', ($especie->imagen->id)?URL.'../content/especies/thumb/'.$especie->imagen->src:'img/uploader-background.jpg', $html);
$html = str_replace('${flor}', ($especie->flor->id)?URL.'../content/especies/thumb/'.$especie->flor->src:'img/uploader-background.jpg', $html);
$html = str_replace('${escala}', ($especie->escala->id)?URL.'../content/especies/thumb/'.$especie->escala->src:'img/uploader-background.jpg', $html);
$html = str_replace('${imagen-id}', ($especie->imagen->id)?$especie->imagen->id:'', $html);
$html = str_replace('${flor-id}', ($especie->flor->id)?$especie->flor->id:'', $html);
$html = str_replace('${escala-id}', ($especie->escala->id)?$especie->escala->id:'', $html);
$html = str_replace('${zonaToCheckbox}', Zona::toCheckbox($especie), $html);
$html = str_replace('${dimensionToCheckbox}', Dimension::toCheckbox($especie), $html);
$html = str_replace('${solToCheckbox}', Sol::toCheckbox($especie), $html);
$html = str_replace('${espacioToCheckbox}', Espacio::toCheckbox($especie), $html);
$html = str_replace('${esquemaToCheckbox}', Esquema::toCheckbox($especie), $html);
$html = str_replace('${regionToSelect}', Region::toSelect($especie), $html);

//tags genericos
$tags = '';
$exist;
for ($i=0, $l=count($tipoTags); $i<$l; $i++) {
    /*$exist = false;
    for ($n=0, $f=count($tagsAsignados); $n<$f; $n++) {
        if ($tipoTags[$i]['id'] == $tagsAsignados[$n]['tipo']) {
            $exist = true;
            break;
        }
    }*/
    if ($especie->hasTipoTag($tipoTags[$i]['id'])) continue;
    $tags .= $tagHtml;
    if (!$tipoTags[$i]['has_descripcion']) $tags = str_replace('${visible-descripcion}', 'hidden', $tags);
    if (!$tipoTags[$i]['has_nivel']) $tags = str_replace('${visible-nivel}', 'hidden', $tags);
    $tags = str_replace('${icon}', $tipoTags[$i]['icon'], $tags);
    $tags = str_replace('${value}', $tipoTags[$i]['value'], $tags);
    $tags = str_replace('${tipo}', $tipoTags[$i]['id'], $tags);
    $tags = str_replace('${id}', $tipoTags[$i]['id'], $tags);
    $tags = preg_replace('/\${*[A-Za-z0-9_-]*\}*/', '', $tags);
}
$html = str_replace('${tags}', $tags, $html);

//tags asignados

$tags = '';
foreach ($especie->tags as $tag) {
    $tags .= $tagHtml;
    if ($tag->descripcion !== NULL) {
        $tags = str_replace('${descripcion}', $tag->descripcion, $tags);
    } else {
        $tags = str_replace('${visible-descripcion}', 'hidden', $tags);
    }
    if ($tag->nivel !== NULL) {
        $tags = str_replace('${checked'.$tag->nivel.'}', 'checked="checked"', $tags);
    } else {
        $tags = str_replace('${visible-nivel}', 'hidden', $tags);
    }
    $tags = str_replace('${icon}', $tag->prototag->tipo->icon, $tags);
    $tags = str_replace('${value}', $tag->prototag->tipo->value, $tags);
    $tags = str_replace('${id}', $tag->prototag->tipo->id, $tags);
    $tags = preg_replace('/\${*[A-Za-z0-9_-]*\}*/', '', $tags);
}
$html = str_replace('${tagsAsignados}', $tags, $html);

$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>