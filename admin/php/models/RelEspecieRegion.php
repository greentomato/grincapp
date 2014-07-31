<?php
class RelEspecieRegion extends Doctrine_Record {
    public function setTableDefinition() {
	$this->setTableName('rel_especie_region');
        $this->hasColumn('id_especie', 'integer', 5, array(
            'primary' => true,
            'unsigned'=>true,
	));
        $this->hasColumn('id_region', 'integer', 3, array(
            'primary' => true,
            'unsigned'=>true,
        ));
    }
}
?>