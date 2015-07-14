<?php
$di = new \Phalcon\DI\FactoryDefault();

$di->setShared('config', function() use ($config) {
    return $config;
});

$di->setShared('ueditor', function() use ($ueditor) {
    return $ueditor;
});


;?>