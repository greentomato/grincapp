<?php
class Espacio extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('espacio');
        $this->hasColumn('id', 'integer', 2, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('value', 'string', 255);
        $this->hasColumn('descripcion', 'string', 255);
        $this->hasColumn('imagen', 'string', 255);
    }
    
    public function setUp(){
        $this->hasMany('Esquema as esquemas', array(
            'local' => 'id_espacio',
            'foreign' => 'id_esquema',
            'refClass' => 'RelEspacioEsquema'
        ));
        $this->hasMany('Especie as especies', array(
            'local' => 'id_espacio',
            'foreign' => 'id_especie',
            'refClass' => 'RelEspecieEspacio'
        ));
        $this->actAs('Sluggable', array('fields'=>array('value'),'unique'=>true,'canUpdate'=>true,'name'=>'slug'));
        $this->actAs('Timestampable', array('created'=>array('disabled'=>true)));
    }
    
    public function desvincular ($relacion) {
        Doctrine_Query::create()->delete($relacion)->where('id_espacio = ?', $this->id)->execute();
    }
    
    public static function toCheckbox ($objeto=false) {
        $html = '';
        $espacios = Doctrine::getTable('espacio')->findAll(Doctrine::HYDRATE_ARRAY);
        if ($objeto) {
            $ids = Doctrine_Query::create()
                    ->select('es.id')
                    ->from('Espacio es')
                    ->innerJoin('es.especies e WITH e.id = '.$objeto->id)
                    ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
            if (!is_array($ids)) $ids = array($ids);
        } else {
            $ids = array();
        }
        for ($i=0, $l=count($espacios); $i<$l; $i++) {
            $checked = (in_array($espacios[$i]['id'], $ids))?' checked="checked"':'';
            $html .= '
                <label class="checkbox">
                    <input value="'.$espacios[$i]['id'].'" type="checkbox" name="espacios[]"'.$checked.'>
                    <i></i>'.$espacios[$i]['value'].'
                </label>'
            ;
        }
        return $html;
    }

}
?>