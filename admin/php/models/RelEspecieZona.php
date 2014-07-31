<?php
class RelEspecieZona extends Doctrine_Record {
    public function setTableDefinition() {
	$this->setTableName('rel_especie_zona');
        $this->hasColumn('id_especie', 'integer', 5, array(
            'primary' => true,
            'unsigned'=>true,
	));
        $this->hasColumn('id_zona', 'integer', 1, array(
            'primary' => true,
            'unsigned'=>true,
        ));
    }
}
?>