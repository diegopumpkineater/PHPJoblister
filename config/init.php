<?php
//config file
require_once 'config.php';

//auto loader
function autoload($class_name)
{
    require_once 'lib/' . $class_name . '.php';
}

spl_autoload_register('autoload');
