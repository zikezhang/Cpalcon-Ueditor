<?php
/**
 * you original config
 */
$config =  new \Phalcon\Config([
    'uniqueId'              =>  'pj-de41dc25-d996-4c40-9818-61af1c375629', //http://www.guidgenerator.com/online-guid-generator.aspx
    'encryptKey'            =>  'BO1{2425*&(GE8',  //http://randomkeygen.com/

    'application' => [
        'controllersDir'    =>  ROOT_PATH . '/app/controllers/',
        'modelsDir'         =>  ROOT_PATH . '/app/models/',
        'viewsDir'          =>  ROOT_PATH . '/app/views/',
        'cacheDir'          =>  ROOT_PATH . '/app/cache/',
        'pluginsDir'        =>  ROOT_PATH . '/app/plugins/',
        'libraryDir'        =>  ROOT_PATH . '/app/library/',
        'baseUri'           =>  'http://localhost',
        'baseUriAdmin'      =>  'http://localhost/admin/',
    ],

    /***************************************************************
     * you can also merge Ueditor configuration file here by
     *
     * 'editor' => ROOT_PATH . '/app/config/ueditor.php';
     ***************************************************************/


]);

?>