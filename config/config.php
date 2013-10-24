<?php
session_start();

define('ROOT_URL','http://localhost:78/notas_uv/');

function notas_autoload($className) {

    $arr = array(
        'ntDB'          => '../libs/notas-db/class-ntDB.php',
        'notas_utility' => '../libs/notas-utility/notas-utility.php',
        'Class_restrict'=> '../libs/notas-utility/Class-restrict.php',
    );

    if (isset($arr[$className])) {
        require_once(dirname(realpath(__FILE__)). '/' . $arr[$className]);
    }
}

spl_autoload_register('notas_autoload');

?>