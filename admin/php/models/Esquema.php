<?php
class Esquema extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('esquema');
        $this->hasColumn('id', 'integer', 1, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('value', 'string', 255);
        $this->hasColumn('descripcion', 'string', 255);
        $this->hasColumn('imagen', 'string', 255);
        $this->hasColumn('grafico', 'string', 255);
    }
    
    public function setUp(){
        $this->hasMany('Especie as especies', array(
            'local' => 'id_esquema',
            'foreign' => 'id_especie',
            'refClass' => 'RelEspecieEsquema'
        ));
    }
    
    public static function toCheckbox ($objeto=false) {
        $html = '';
        $esquemas = Doctrine::getTable('esquema')->findAll(Doctrine::HYDRATE_ARRAY);
        if ($objeto) {
            $ids = Doctrine_Query::create()
                    ->select('es.id')
                    ->from('Esquema es')
                    ->innerJoin('es.especies e WITH e.id = '.$objeto->id)
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