<?php
class Imagen extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('imagen');
        $this->hasColumn('id', 'integer', 8, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('src', 'string', 255);
        $this->hasColumn('titulo', 'string', 255);
        $this->hasColumn('descripcion', 'string', 10000);
        $this->hasColumn('orden', 'integer', 3, array('default'=>0, 'unsigned'=>true));
        $this->hasColumn('id_esquema', 'integer', 2, array('unsigned'=>true));
    }
    
    public function setUp(){
        $this->hasOne('Esquema as esquema',array(
            'local'=>'id_esquema',
            'foreign'=>'id'
        ));
    }

    public static function lastId () {
        $q = Doctrine_Query::create()
                ->select('i.id')
                ->from('Imagen i')
                ->orderBy('i.id desc')
                ->limit(1)
                ->offset(0);
        $result = $q->fetchOne(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
        return $result;
    }
    
}
?>