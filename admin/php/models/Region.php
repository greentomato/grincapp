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

}
?>