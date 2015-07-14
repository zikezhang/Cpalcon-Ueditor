<?php
/**
 * Defined useful constant
 */
date_default_timezone_set('America/New_York');
define('DEBUG', true);
define('ROOT_PATH', realpath('..'));
define('DS', DIRECTORY_SEPARATOR);

/**
 * Stage developement Flag
 */
if(DEBUG == true) {
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 'Off');
    error_reporting(0);
}

/**
 * Versions Required.
 */
define('PHALCON_VERSION_REQUIRED', '1.3*');
define('PHP_VERSION_REQUIRED', '>=5.4');

/**
 * Check phalcon framework installation.
 */
if (!extension_loaded('phalcon')) {
    printf('Install Phalcon framework %s', PHALCON_VERSION_REQUIRED);
    exit(1);
}
/**
 * Read the configuration
 * May be your original default config
 */
require_once ROOT_PATH . '/app/config/config.php';

/**
 * Register autoload
 */
require_once ROOT_PATH . '/app/config/loader.php';

/**
 * Read the editor
 */
require_once ROOT_PATH . '/app/config/ueditor.php';

/**
 * Register DI service
 */
require_once ROOT_PATH . '/app/config/service.php';



/**
 * Start Application
 */
$application = new \Phalcon\Mvc\Application($di);
echo $application->handle()->getContent();


