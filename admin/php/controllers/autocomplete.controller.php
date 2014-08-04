<?php
include_once('../bootstrap.php');
$tags = Doctrine_Query::create()
        ->select('DISTINCT r.value as label, r.value as value')
        ->from('Region r')
        ->where('r.value like ?', $_GET['term'].'%')
        ->limit(5)
        ->offset(0)
        ->orderBy('r.value')
        ->execute(array(), Doctrine::HYDRATE_ARRAY);
header("Content-type: application/json");
echo(json_encode($tags));
?>