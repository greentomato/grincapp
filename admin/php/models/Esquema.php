<?php
class Esquema extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('esquema');
        $this->hasColumn('id', 'integer', 2, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('value', 'string', 255);
        $this->hasColumn('descripcion', 'string', 255);
        $this->hasColumn('imagen', 'string', 255);
    }
    
    public function setUp(){
        $this->hasMany('Imagen as bloques', array(
            'local' => 'id',
            'foreign' => 'id_esquema'
        ));
        $this->hasMany('Especie as especies', array(
            'local' => 'id_esquema',
            'foreign' => 'id_especie',
            'refClass' => 'RelEspecieEsquema'
        ));
        $this->hasMany('Espacio as espacios', array(
            'local' => 'id_esquema',
            'foreign' => 'id_espacio',
            'refClass' => 'RelEspacioEsquema'
        ));
        $this->actAs('Sluggable', array('fields'=>array('value'),'unique'=>true,'canUpdate'=>true,'name'=>'slug'));
        $this->actAs('Timestampable', array('created'=>array('disabled'=>true)));
    }
    
    public function desvincular ($relacion) {
        Doctrine_Query::create()->delete($relacion)->where('id_esquema = ?', $this->id)->execute();
    }
    
    public function bloquesOrdenados ($hydrateMode = Doctrine::HYDRATE_ARRAY) {
        return Doctrine_Query::create()
                ->select('i.*')
                ->from('Imagen i')
                ->where('i.id_esquema = ?', $this->id)
                ->orderBy('i.orden')
                ->execute(array(), $hydrateMode)
        ;
    }
    
    public static function toCheckbox ($objeto=false) {
        $html = '';
        $esquemas = Doctrine::getTable('esquema')->findAll(Doctrine::HYDRATE_ARRAY);
        if ($objeto) {
            $ids = Doctrine_Query::create()
                    ->select('es.id')
                    ->from('Esquema es')
                    ->innerJoin('es.'.strtolower(get_class($objeto)).'s e WITH e.id = '.$objeto->id)
                    ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
            if (!is_array($ids)) $ids = array($ids);
        } else {
            $ids = array();
        }
        for ($i=0, $l=count($esquemas); $i<$l; $i++) {
            $checked = (in_array($esquemas[$i]['id'], $ids))?' checked="checked"':'';
            $html .= '
                <label class="checkbox">
                    <input value="'.$esquemas[$i]['id'].'" type="checkbox" name="esquemas[]"'.$checked.'>
                    <i></i>'.$esquemas[$i]['value'].'
                </label>'
            ;
        }
        return $html;
    }

}
?>