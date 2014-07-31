<?php
class Dimension extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('dimension');
        $this->hasColumn('id', 'integer', 1, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('value', 'string', 255);
        $this->hasColumn('letra', 'string', 5);
        $this->hasColumn('tooltip', 'string', 255);
    }
    
    public function setUp(){
        $this->hasMany('Especie as especies', array(
            'local' => 'id_dimension',
            'foreign' => 'id_especie',
            'refClass' => 'RelEspecieDimension'
        ));
    }
    
    public static function toCheckbox ($objeto=false) {
        $html = '';
        $dimensiones = Doctrine::getTable('dimension')->findAll(Doctrine::HYDRATE_ARRAY);
        if ($objeto) {
            $ids = Doctrine_Query::create()
                    ->select('d.id')
                    ->from('Dimension d')
                    ->innerJoin('d.especies e WITH e.id = '.$objeto->id)
                    ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
            if (!is_array($ids)) $ids = array($ids);
        } else {
            $ids = array();
        }
        for ($i=0, $l=count($dimensiones); $i<$l; $i++) {
            $checked = (in_array($dimensiones[$i]['id'], $ids))?' checked="checked"':'';
            $html .= '
                <label class="checkbox">
                    <input value="'.$dimensiones[$i]['id'].'" type="checkbox" name="dimensiones[]"'.$checked.'>
                    <i></i>'.$dimensiones[$i]['value'].'
                </label>'
            ;
        }
        return $html;
    }

}
?>
