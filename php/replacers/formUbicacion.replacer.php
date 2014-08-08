<?php
$zonas = $dimensiones = $soles = '';
for ($i=0, $l=count($resutls); $i<$l; $i++) {
    if ($resutls[$i]['zonaId']) {
        $checked = (isset($_POST['zona']) && $_POST['zona'] == $resutls[$i]['zonaId'])?'checked':'';
        $zonas .= $labelRadioTpl;
        $zonas = str_replace('${id}', $resutls[$i]['zonaId'], $zonas);
        $zonas = str_replace('${title}', htmlentities($resutls[$i]['zonaTooltip']), $zonas);
        $zonas = str_replace('${titulo}', '<h3><i class="fa '.$resutls[$i]['zonaIcon'].' fa-lg"></i>'.htmlentities($resutls[$i]['zonaVale']).'</h3>', $zonas);
        $zonas = str_replace('${checked}', $checked, $zonas);
    }
    if ($resutls[$i]['dimensionId']) {
        $checked = (isset($_POST['dimension']) && $_POST['dimension'] == $resutls[$i]['dimensionId'])?'checked':'';
        $dimensiones .= $labelRadioTpl;
        $dimensiones = str_replace('${id}', $resutls[$i]['dimensionId'], $dimensiones);
        $dimensiones = str_replace('${titulo}', '<h3>'.$resutls[$i]['dimensionLetra'].'</h3>', $dimensiones);
        $dimensiones = str_replace('${descripcion}', '<p>'.htmlentities($resutls[$i]['dimensionValue']).'</p>', $dimensiones);
        $dimensiones = str_replace('${checked}', $checked, $dimensiones);
    }
    if ($resutls[$i]['solId']) {
        $checked = (isset($_POST['sol']) && $_POST['sol'] == $resutls[$i]['solId'])?'checked':'';
        $soles .= $labelRadioTpl;
        $soles = str_replace('${id}', $resutls[$i]['solId'], $soles);
        $soles = str_replace('${titulo}', $resutls[$i]['solIcon'], $soles);
        $soles = str_replace('${descripcion}', '<p>'.htmlentities($resutls[$i]['solValue']).'</p>', $soles);
        $soles = str_replace('${checked}', $checked, $soles);
    }
}

$zonas = str_replace('${labelClass}', 'areaDescription', $zonas);
$zonas = str_replace('${name}', 'zona', $zonas);
$zonas = str_replace('${divClass}', 'asideItemContent tooltip', $zonas);

$dimensiones = str_replace('${labelClass}', 'terrainDimension', $dimensiones);
$dimensiones = str_replace('${name}', 'dimension', $dimensiones);
$dimensiones = str_replace('${divClass}', 'terrainDimensionItem', $dimensiones);

$soles = str_replace('${labelClass}', 'terrainDimension', $soles);
$soles = str_replace('${name}', 'sol', $soles);
$soles = str_replace('${divClass}', 'terrainDimensionItem', $soles);

if (isset($_POST['lugar'])) $html = str_replace('${lugar}', $_POST['lugar'], $html);

$html = str_replace('${zonas}', $zonas, $html);
$html = str_replace('${dimensiones}', $dimensiones, $html);
$html = str_replace('${soles}', $soles, $html);
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>