<?php

$dbConfig = include('Common/Conf/db_config.php');

$appConfig =  array(
    // 调试页
    'SHOW_PAGE_TRACE' =>false,

    // 默认模块和Action
    'MODULE_ALLOW_LIST' => array('Home'),
    'DEFAULT_MODULE' => 'Home',

    // 默认控制器
    'DEFAULT_CONTROLLER' => 'Index',
);


return array_merge($appConfig, $dbConfig);