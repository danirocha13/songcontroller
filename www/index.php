<?php

// Define path to application directory
defined('ROOT_PATH') || define('ROOT_PATH', realpath(dirname(__FILE__)));
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));


// Define application environment
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';
//Conexão com o banco
require_once('Doctrine.php');
spl_autoload_register(array('Doctrine', 'autoload'));


// Create application, bootstrap, and run
$application = new Zend_Application(
        APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini'
);

$registry = Zend_Registry::getInstance();

require_once('AppUtil.php');
spl_autoload_register(array('AppUtil', 'autoload'));
$configDb = new Zend_Config_Ini('../application/configs/application.ini', 'database');
$registry->set('database', $configDb);
DbUtil::setConnectionDoctrine($configDb);
//DbUtil::generateModels();

$front = Zend_Controller_Front::getInstance();
$front->registerPlugin(new AclPlugin());
    
//$registry->set('Zend_Currency', 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');
$application->bootstrap()->run();
