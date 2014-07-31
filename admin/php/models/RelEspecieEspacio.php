<?php
class RelEspecieEspacio extends Doctrine_Record {
    public function setTableDefinition() {
	$this->setTableName('rel_especie_espacio');
        $this->hasColumn('id_especie', 'integer', 5, array(
            'primary' => true,
            'unsigned'=>true,
	));
        $this->hasColumn('id_espacio', 'integer', 1, array(
            'primary' => true,
            'unsigned'=>true,
        ));
    }
}
?>