<?php
class Tag extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('tag');
        $this->hasColumn('id', 'integer', 8, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('descripcion', 'string', 255);
        $this->hasColumn('nivel', 'integer', 1, array('default' => NULL, 'unsigned'=>true)); //nivel del 0 al 5
        $this->hasColumn('id_especie', 'integer', 5, array('unsigned'=>true));
        $this->hasColumn('id_prototag', 'integer', 2, array('unsigned'=>true));
    }
    
    public function setUp(){
        $this->hasOne('Especie as especie',array(
            'local'=>'id_especie',
            'foreign'=>'id'
        ));
        $this->hasOne('Prototag as prototag',array(
            'local'=>'id_prototag',
            'foreign'=>'id'
        ));
    }

}
?>