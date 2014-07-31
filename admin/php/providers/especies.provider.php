<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$orderColumn = array(
    'e.nombre',
    'e.denominacion',
    'e.id'
);
$recordsTotal = Doctrine_Query::create()
        ->select('count(e.id)')
        ->from('Especie e')
        ->where('e.estado = 1')
        ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR)
;

$data = Doctrine_Query::create()
        ->select('
            e.id,
            CONCAT("row", e.id) as DT_RowId,
            CONCAT("
                <a href=\"#\" data-id=\"",e.id,"\" class=\"btn btn-danger borrarEspecie\"><i class=\"fa fa-trash-o\"></i></a>
                <a href=\"especie/",e.slug,"\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>"
            ) as acciones,
            e.nombre as nombre,
            e.denominacion as denominacion
        ')
        ->from('Especie e')
        ->where('e.estado = 1')
        ->limit($_GET['length'])
        ->offset($_GET['start'])
        ->orderBy($orderColumn[$_GET['order'][0]['column']].' '.$_GET['order'][0]['dir'])
;

//busqueda
if ($_GET['search']['value']) {
    $data->andWhere('e.nombre like ? or e.denominacion like ?', array($_GET['search']['value'].'%', $_GET['search']['value'].'%'));
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