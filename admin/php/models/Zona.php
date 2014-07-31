<?php
class Zona extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('zona');
        $this->hasColumn('id', 'integer', 1, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('value', 'string', 255);
        $this->hasColumn('tooltip', 'string', 255);
        $this->hasColumn('icon', 'string', 20);
    }
    
    public function setUp(){
        $this->hasMany('Especie as especies', array(
            'local' => 'id_zona',
            'foreign' => 'id_especie',
            'refClass' => 'RelEspecieZona'
        ));
    }
    
    public static function toCheckbox ($objeto=false) {
        $html = '';
        $zonas = Doctrine::getTable('zona')->findAll(Doctrine::HYDRATE_ARRAY);
        if ($objeto) {
            $ids = Doctrine_Query::create()
                    ->select('z.id')
                    ->from('Zona z')
                    ->innerJoin('z.especies e WITH e.id = '.$objeto->id)
                    ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
            if (!is_array($ids)) $ids = array($ids);
        } else {
            $ids = array();
        }
        for ($i=0, $l=count($zonas); $i<$l; $i++) {
            $checked = (in_array($zonas[$i]['id'], $ids))?' checked="checked"':'';
            $html .= '
                <label class="checkbox">
                    <input value="'.$zonas[$i]['id'].'" type="checkbox" name="zonas[]"'.$checked.'>
                    <i></i>'.$zonas[$i]['value'].'
                </label>'
            ;
        }
        return $html;
    }

}
?>