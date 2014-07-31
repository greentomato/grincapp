<?php
class Sol extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('sol');
        $this->hasColumn('id', 'integer', 1, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('value', 'string', 255);
        $this->hasColumn('icon', 'string', 80);
        $this->hasColumn('tooltip', 'string', 255);
    }
    
    public function setUp(){
        $this->hasMany('Especie as especies', array(
            'local' => 'id_sol',
            'foreign' => 'id_especie',
            'refClass' => 'RelEspecieSol'
        ));
    }
    
    public static function toCheckbox ($objeto=false) {
        $html = '';
        $soles = Doctrine::getTable('sol')->findAll(Doctrine::HYDRATE_ARRAY);
        if ($objeto) {
            $ids = Doctrine_Query::create()
                    ->select('s.id')
                    ->from('Sol s')
                    ->innerJoin('s.especies e WITH e.id = '.$objeto->id)
                    ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
            if (!is_array($ids)) $ids = array($ids);
        } else {
            $ids = array();
        }
        for ($i=0, $l=count($soles); $i<$l; $i++) {
            $checked = (in_array($soles[$i]['id'], $ids))?' checked="checked"':'';
            $html .= '
                <label class="checkbox">
                    <input value="'.$soles[$i]['id'].'" type="checkbox" name="soles[]"'.$checked.'>
                    <i></i>'.$soles[$i]['value'].'
                </label>'
            ;
        }
        return $html;
    }

}
?>