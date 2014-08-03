<?php
class Especie extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('especie');
        $this->hasColumn('id', 'integer', 5, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('nombre', 'string', 255);
        $this->hasColumn('denominacion', 'string', 255);
        $this->hasColumn('id_imagen', 'integer', 8, array('unsigned'=>true));
        $this->hasColumn('id_flor', 'integer', 8, array('unsigned'=>true));
        $this->hasColumn('id_escala', 'integer', 8, array('unsigned'=>true));
    }
    
    public function setUp(){
        $this->hasOne('Imagen as imagen',array(
            'local'=>'id_imagen',
            'foreign'=>'id',
            'onDelete' => 'SET NULL'
        ));
        $this->hasOne('Imagen as flor',array(
            'local'=>'id_flor',
            'foreign'=>'id',
            'onDelete' => 'SET NULL'
        ));
        $this->hasOne('Imagen as escala',array(
            'local'=>'id_escala',
            'foreign'=>'id',
            'onDelete' => 'SET NULL'
        ));
        
        $this->hasMany('Tag as tags', array(
            'local' => 'id',
            'foreign' => 'id_especie'
        ));
        
        $this->hasMany('Dimension as dimensiones', array(
            'local' => 'id_especie',
            'foreign' => 'id_dimension',
            'refClass' => 'RelEspecieDimension'
        ));
        
        $this->hasMany('Espacio as espacios', array(
            'local' => 'id_especie',
            'foreign' => 'id_espacio',
            'refClass' => 'RelEspecieEspacio'
        ));
        
        $this->hasMany('Esquema as esquemas', array(
            'local' => 'id_especie',
            'foreign' => 'id_esquema',
            'refClass' => 'RelEspecieEsquema'
        ));
        
        $this->hasMany('Region as regiones', array(
            'local' => 'id_especie',
            'foreign' => 'id_region',
            'refClass' => 'RelEspecieRegion'
        ));
        
        $this->hasMany('Sol as soles', array(
            'local' => 'id_especie',
            'foreign' => 'id_sol',
            'refClass' => 'RelEspecieSol'
        ));
        
        $this->hasMany('Zona as zonas', array(
            'local' => 'id_especie',
            'foreign' => 'id_zona',
            'refClass' => 'RelEspecieZona'
        ));
        
        $this->actAs('Sluggable', array('fields'=>array('nombre'),'unique'=>true,'canUpdate'=>true,'name'=>'slug'));
        $this->actAs('Timestampable', array('created'=>array('disabled'=>true)));
    }
    
    public function hasTipoTag ($tipoTagId) {
        return Doctrine_Query::create()
                ->select('count(e.id)')
                ->from('Especie e')
                ->innerJoin('e.tags t')
                ->innerJoin('t.prototag p WITH p.id_tipo = ?', $tipoTagId)
                ->where('e.id = ?', $this->id)
                ->fetchOne(array(), Doctrine::HYDRATE_SINGLE_SCALAR)
        ;
    }
    
    public function desvincular ($relacion) {
        Doctrine_Query::create()->delete($relacion)->where('id_especie = ?', $this->id)->execute();
    }
    
}
?>