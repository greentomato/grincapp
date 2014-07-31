<?php
class Usuario extends Doctrine_Record {

    public function setTableDefinition() {
        $this->setTableName('usuario');
        $this->hasColumn('id', 'integer', 1, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('nick', 'string', 32);
        $this->hasColumn('pass', 'string', 32);
    }

    //INCIO DE GETERS Y SETERS
    public function setPass($pass) {
        $this->_set('pass', md5($pass));
    }
    //FIN SETERS Y GETERS

    static public function isValido($nick, $pass) {
        $q = Doctrine_Query::create()
                ->select('u.*')
                ->from('Usuario u')
                ->where('u.nick = ?', $nick);
        $usuario = $q->fetchOne();
        return ($usuario->pass == md5($pass)) ? $usuario : false;
    }

}
?>