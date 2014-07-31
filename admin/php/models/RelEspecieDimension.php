<?php
class RelEspecieDimension extends Doctrine_Record {
    public function setTableDefinition() {
	$this->setTableName('rel_especie_dimension');
        $this->hasColumn('id_especie', 'integer', 5, array(
            'primary' => true,
            'unsigned'=>true,
	));
        $this->hasColumn('id_dimension', 'integer', 1, array(
            'primary' => true,
            'unsigned'=>true,
        ));
    }
}
?>