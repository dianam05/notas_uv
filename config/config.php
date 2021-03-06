<?php
session_start();

define('ROOT_URL','http://localhost:8080/notas_uv/');

function notas_autoload($className) {

    $arr = array(
        'ntDB'          => '../libs/notas-db/class-ntDB.php',
        'notas_utility' => '../libs/notas-utility/notas-utility.php',
        'Class_restrict'=> '../libs/notas-utility/Class-restrict.php',
        'class_admin_notas'=> '../libs/notas-utility/class_admin_notas.php',
        'class_admin_user'=> '../libs/notas-utility/class_admin_user.php',
        'class_admin_resources'=> '../libs/notas-utility/class_admin_resources.php',
    );

    if (isset($arr[$className])) {
        require_once(dirname(realpath(__FILE__)). '/' . $arr[$className]);
    }
}

spl_autoload_register('notas_autoload');

?>