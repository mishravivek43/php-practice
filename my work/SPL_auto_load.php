<?php
/**
 This file must be included by all to fetch all .php files simultaneously.
 * /*
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $path = '/var/www/html/log/';

    include $path.$className.'.php';
}

*/
spl_autoload_extensions('.php');
spl_autoload_register('loadClasses');
//load all php files in the localhost directory
function loadClasses($className)
{
    define('ROOT_DIR','/var/www/html/');
    define('DS','/');
    try {
        if (file_exists(ROOT_DIR  . 'my work/' . $className . '.php')) {//mywork folder
            set_include_path(ROOT_DIR  . 'my work' . DS);
            spl_autoload($className);
          }elseif (file_exists(ROOT_DIR  . 'log/' . $className . '.php')) {//log folder and so on.....
            set_include_path(ROOT_DIR  . 'log' . DS);
            spl_autoload($className);
        } elseif (file_exists(ROOT_DIR  .'login/' . $className . '.php')) {
            set_include_path(ROOT_DIR  . 'login' . DS);
            spl_autoload($className);
        } elseif (file_exists(ROOT_DIR  .'app/' . $className . '.php')) {
            set_include_path(ROOT_DIR  . 'app' . DS);
            spl_autoload($className);
        }elseif (file_exists(ROOT_DIR  .'PDO/' . $className . '.php')) {
            set_include_path(ROOT_DIR  . 'PDO' . DS);
            spl_autoload($className);
        }elseif (file_exists(ROOT_DIR  .'php_oop/' . $className . '.php')) {
            set_include_path(ROOT_DIR  . 'php_oop' . DS);
            spl_autoload($className);
        } elseif (file_exists(ROOT_DIR  .'myphp/' . $className . '.php')) {
            set_include_path(ROOT_DIR  . 'myphp' . DS);
            spl_autoload($className);
        } elseif (file_exists(ROOT_DIR  .'tabular data/' . $className . '.php')) {
            set_include_path(ROOT_DIR  . 'tabular data' . DS);
            spl_autoload($className);
        } elseif (file_exists(ROOT_DIR  . $className . '.php')){
            set_include_path(ROOT_DIR );
            spl_autoload($className);
        }else
        {
            throw new Exception('Class does not exist');//throwing the exceptions 
        }
    }
    catch(Exception $e)
    {
        echo $e;//catching the exception

    }
}
?>
