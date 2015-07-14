<?php
$loader = new \Phalcon\Loader();

/**
 * Registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces([
    'Controller'    =>  $config->application->controllersDir,
    'Model'         =>  $config->application->modelsDir,
    'Phalcon'       =>  $config->application->libraryDir . 'Phalcon/',
    'Cp'            =>  $config->application->libraryDir . 'Cp/',
    'Other'         =>  $config->application->libraryDir . 'Other/',
]);


$loader->register();
