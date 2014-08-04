<?php
$bloquesHtml = '';

$bloques = $esquema->bloques;
if ($bloques->count()) {
    foreach ($bloques as $bloque) {
        if ($bloque->titulo) $bloquesHtml .= '<h3>'.$bloque->titulo.'</h3>';
        if ($bloque->descripcion) $bloquesHtml .= '<p>'.$bloque->descripcion.'</p>';
        if ($bloque->src) $bloquesHtml .= '<div class="esquemaData"><img src="content/esquemas/'.$bloque->src.'" alt="${value}"></div>';
        
    }
}
$html = str_replace('${bloques}', $bloquesHtml, $html);
$html = str_replace('${value}', $esquema->value, $html);
$html = preg_replace('/\${*[A-Za-z0-9]*\}*/', '', $html);
?>