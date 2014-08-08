<?php
class Region extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('region');
        $this->hasColumn('id', 'integer', 3, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('value', 'string', 255);
        $this->hasColumn('polygon', 'string', 10000);
    }
    
    public function setUp(){
        $this->hasMany('Especie as especies', array(
            'local' => 'id_region',
            'foreign' => 'id_especie',
            'refClass' => 'RelEspecieRegion'
        ));
        $this->actAs('Sluggable', array('fields'=>array('value'),'unique'=>true,'canUpdate'=>true,'name'=>'slug'));
    }
    
    public function desvincular ($relacion) {
        Doctrine_Query::create()->delete($relacion)->where('id_region = ?', $this->id)->execute();
    }
    
    public static function toSelect ($especie=false) {
        if ($especie) {
            $regionesSelected = Doctrine_Query::create()
                    ->select('r.id')
                    ->from('Region r')
                    ->innerJoin('r.especies as e WITH e.id = ?', $especie->id)
                    ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR)
            ;
            if (!is_array($regionesSelected)) $regionesSelected = array($regionesSelected);
        } else {
            $regionesSelected = array();
        }
        $regiones = Doctrine::getTable('region')->findAll(Doctrine::HYDRATE_ARRAY);
        $html = '<select name="regiones[]" multiple style="width:100%" class="select2">';
        foreach ($regiones as $region) {
            $selected = (in_array($region['id'], $regionesSelected))?' selected="selected"':'';
            $html .= '<option value="'.$region['id'].'"'.$selected.'>'.$region['value'].'</option>';
        }
        $html .= '</select>';
        return $html;
    }

}
?>