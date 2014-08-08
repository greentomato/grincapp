<?php
require_once(dirname(__FILE__) . '/lib/vendor/doctrine/Doctrine.php');
spl_autoload_register(array('Doctrine', 'autoload'));
$manager = Doctrine_Manager::getInstance();
$manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
$manager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
$conn = Doctrine_Manager::connection('mysql://grinc_admin:ladivinacomedia-12358@192.168.0.58/grinc_base','grinc');
Doctrine_Core::loadModels(dirname(__FILE__) .'/models');
define('BOOTSTRAP', true);
?>