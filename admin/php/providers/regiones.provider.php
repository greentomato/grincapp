<?php
//�
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$orderColumn = array(
    'r.value',
    'r.id'
);
$recordsTotal = Doctrine_Query::create()
        ->select('count(r.id)')
        ->from('Region r')
        ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR)
;

$data = Doctrine_Query::create()
        ->select('
            r.id,
            CONCAT("row", r.id) as DT_RowId,
            CONCAT("
                <a href=\"#\" data-id=\"",r.id,"\" class=\"btn btn-danger borrarRegion\"><i class=\"fa fa-trash-o\"></i></a>
                <a href=\"region/",r.slug,"\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>"
            ) as acciones,
            r.value as value
        ')
        ->from('Region r')
        ->limit($_GET['length'])
        ->offset($_GET['start'])
        ->orderBy($orderColumn[$_GET['order'][0]['column']].' '.$_GET['order'][0]['dir'])
;

//busqueda
if ($_GET['search']['value']) {
    $data->andWhere('r.value like ?', $_GET['search']['value'].'%');
}
//fin busqueda

//echo(json_encode($productos)); exit();
$restul = array(
    'recordsTotal'=>$recordsTotal,
    'recordsFiltered'=>$recordsTotal,
    'data'=>$data->execute(array(), Doctrine::HYDRATE_ARRAY)
);
echo(json_encode($restul));
?>