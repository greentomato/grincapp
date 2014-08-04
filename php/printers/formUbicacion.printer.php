<?php
if (!defined('INC')) include('../includes/definer.php');
if (!defined('BOOTSTRAP')) include(INC.'admin/php/bootstrap.php');
$pdo = Doctrine_Manager::getInstance()->getCurrentConnection()->getDbh();
$query = <<<ENDQUERY
select z.id as zonaId, z.value as zonaVale, z.icon as zonaIcon, z.tooltip as zonaTooltip,
    d.id as dimensionId, d.value as dimensionValue, d.letra as dimensionLetra, d.tooltip as dimensionTooltip,
    s.id as solId, s.value as solValue, s.icon as solIcon
from zona as z
left join dimension as d on z.id = d.id
left join sol as s on z.id = s.id
ENDQUERY;
$stmt = $pdo->prepare($query);
$stmt->execute(array());
$resutls = $stmt->fetchAll(PDO::FETCH_ASSOC);
$html = file_get_contents(INC.'tpl/form-ubicacion.tpl');
$labelRadioTpl = file_get_contents(INC.'tpl/label-radio.tpl');
include(INC.'php/replacers/formUbicacion.replacer.php');
echo($html);
?>