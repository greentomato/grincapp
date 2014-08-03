<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$orderColumn = array(
    'e.value',
    'e.descripcion',
    'e.id'
);
$recordsTotal = Doctrine_Query::create()
        ->select('count(e.id)')
        ->from('Esquema e')
        ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR)
;

$data = Doctrine_Query::create()
        ->select('
            e.id,
            CONCAT("row", e.id) as DT_RowId,
            CONCAT("
                <a href=\"#\" data-id=\"",e.id,"\" class=\"btn btn-danger borrarEsquema\"><i class=\"fa fa-trash-o\"></i></a>
                <a href=\"esquema/",e.slug,"\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>"
            ) as acciones,
            e.value as titulo,
            SUBSTRING(e.descripcion, 1, 89) as descripcion
        ')
        ->from('Esquema e')
        ->limit($_GET['length'])
        ->offset($_GET['start'])
        ->orderBy($orderColumn[$_GET['order'][0]['column']].' '.$_GET['order'][0]['dir'])
;

//busqueda
if ($_GET['search']['value']) {
    $data->andWhere('e.value like ?', $_GET['search']['value'].'%');
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