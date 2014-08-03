<?php
class RelEspacioEsquema extends Doctrine_Record {
    public function setTableDefinition() {
	$this->setTableName('rel_espacio_esquema');
        $this->hasColumn('id_espacio', 'integer', 2, array(
            'primary' => true,
            'unsigned'=>true,
	));
        $this->hasColumn('id_esquema', 'integer', 2, array(
            'primary' => true,
            'unsigned'=>true,
        ));
    }
}
?>