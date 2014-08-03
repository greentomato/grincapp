<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
include(INC.'php/clases/PointLocation.php');
$region = Doctrine::getTable('region')->find(5);
$pointLocation = new pointLocation();

$point = '-34.6059786243242 -58.4368371963501'; //adentro
//$point =  '-34.60297614585056 -58.42323303222656'; //fuera
//$point =  '-34.60703829668972 -58.42207431793213'; //fuera

$polygon = explode(',', $region->polygon);
$polygon[] = $polygon[0];
echo($pointLocation->pointInPolygon($point, $polygon));
?>
