<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$orderColumn = array(
    'e.id',
    'e.nombre',
    'e.denominacion'
);

$recordsTotal = Doctrine_Query::create()
        ->select('count(e.id)')
        ->from('Especie e')
        ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR)
;
//<a href=\"producto/", p.slug, "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>
$data = Doctrine_Query::create()
        ->select('
            CONCAT("row", e.id) as DT_RowId,
            e.id,
            e.nombre as nombre,
            e.denominacion as denominacion,
            CONCAT("
                <a data-especie=\"",e.id,"\" onclick=\"addEspeciethis\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus\"></i></a>
                <a style=\"display:none\" data-especie=\"",e.id,"\" onclick=\"removeEspeciethis\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-minus\"></i></a>
            ") as acciones
        ')
        ->from('Especie e')
        ->limit($_GET['length'])
        ->offset($_GET['start'])
        ->orderBy($orderColumn[$_GET['order'][0]['column']].' '.$_GET['order'][0]['dir'])
;
//busqueda
if ($_GET['search']['value']) {
    $data->andWhere('e.nombre like ? or e.descripcion like ?', array($_GET['search']['value'].'%', $_GET['search']['value'].'%'));
}
//fin busqueda

//echo(json_encode($productos)); exit();
$restul = array(
    'recordsTotal'=>$recordsTotal,
    'recordsFiltered'=>$recordsTotal,
    'data'=>$data->execute(array(), Doctrine::HYDRATE_ARRAY)
);
echo(str_replace('Especiethis', 'Especie(this)', json_encode($restul)));
?>