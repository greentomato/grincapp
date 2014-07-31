<?php
class RelEspecieSol extends Doctrine_Record {
    public function setTableDefinition() {
	$this->setTableName('rel_especie_sol');
        $this->hasColumn('id_especie', 'integer', 5, array(
            'primary' => true,
            'unsigned'=>true,
	));
        $this->hasColumn('id_sol', 'integer', 1, array(
            'primary' => true,
            'unsigned'=>true,
        ));
    }
}
?>