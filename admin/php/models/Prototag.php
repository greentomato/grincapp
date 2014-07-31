<?php
class Prototag extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('prototag');
        $this->hasColumn('id', 'integer', 2, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('tooltip', 'string', 255);
        $this->hasColumn('nivel', 'integer', 1, array('default' => NULL, 'unsigned'=>true)); //nivel del 1 al 3
        $this->hasColumn('id_tipo', 'integer', 2, array('unsigned'=>true));
    }
    
    public function setUp(){
        $this->hasOne('TipoTag as tipo',array(
            'local'=>'id_tipo',
            'foreign'=>'id'
        ));
    }
}
?>