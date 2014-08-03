<?php
class RelEspecieEsquema extends Doctrine_Record {
    public function setTableDefinition() {
	$this->setTableName('rel_especie_esquema');
        $this->hasColumn('id_especie', 'integer', 5, array(
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