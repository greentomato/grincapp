<?php
if (!defined('INC')) include('../includes/definer.php');
if (!defined('BOOTSTRAP')) include(INC.'admin/php/bootstrap.php');
include(INC.'admin/php/clases/PointLocation.php');

if (isset($_POST['zona'])) {
    $userSelection = $_POST;
    $_SESSION['userSelection'] = serialize($_POST);
} else {
    $userSelection = $_SESSION['userSelection'];
}

$regiones = Doctrine_Query::create()
        ->select('r.id, r.polygon')
        ->from('Region r')
        ->innerJoin('r.especies as e')
        ->innerJoin('e.zonas as z WITH z.id = ?', $userSelection['zona'])
        ->innerJoin('e.dimensiones as d WITH d.id = ?', $userSelection['dimension'])
        ->innerJoin('e.soles as s WITH s.id = ?', $userSelection['sol'])
        ->execute(array(), Doctrine::HYDRATE_ARRAY)
;

//localizacion
$pointLocation = new pointLocation();
$point = str_replace('(', '', $userSelection['location']);
$point = str_replace(')', '', $point);
$point = str_replace(',', '', $point);

$ids = array();
for ($i=0, $l=count($regiones); $i<$l; $i++) {
    $polygon = null;
    $polygon = explode(',', $regiones[$i]['polygon']);
    if ($pointLocation->pointInPolygon($point, $polygon) != 'outside') {
        $ids[] = $regiones[$i]['id'];
    }
}

$userSelection['regiones'] = $ids;
$_SESSION['userSelection'] = $userSelection;

if (count($ids)) {
    $espacios = Doctrine_Query::create()
            ->select('esp.slug, esp.value, esp.descripcion, esp.imagen')
            ->from('Espacio esp')
            ->innerJoin('esp.especies as e')
            ->innerJoin('e.zonas as z WITH z.id = ?', $userSelection['zona'])
            ->innerJoin('e.dimensiones as d WITH d.id = ?', $userSelection['dimension'])
            ->innerJoin('e.soles as s WITH s.id = ?', $userSelection['sol'])
            ->innerJoin('e.regiones as r')
            ->whereIn('r.id', $ids)
            ->execute(array(), Doctrine::HYDRATE_ARRAY)
    ;
} else {
    $espacios = array();
}
$html = '';
$spaceBoxTpl = file_get_contents(INC.'tpl/space-box.tpl');
include(INC.'php/replacers/espacios.replacer.php');
if (strlen($html) == 0) {
    $html = '
        <li class="no-results">No encontramos espacios de plantaci&oacute;n para tu zona.<br />
        Estamos trabajando para extender nuestro alcance.</li>
    ';
}
echo($html);
?>