<?php
class TipoTag extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('tipo_tag');
        $this->hasColumn('id', 'integer', 2, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('value', 'string', 255);
        $this->hasColumn('icon', 'string', 30);
        $this->hasColumn('has_descripcion', 'integer', 1, array('unsigned'=>true, 'default'=>0));
        $this->hasColumn('has_nivel', 'integer', 1, array('unsigned'=>true, 'default'=>0));
    }
}
?>