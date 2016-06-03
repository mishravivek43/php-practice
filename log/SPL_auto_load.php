<?php
/**
 * Created by PhpStorm.
 * User: bridgelabz
 * Date: 22/3/16
 * Time: 4:54 PM
 */


/*
* defined function responsible for loading class,
* replacing the old __ autoload.
* ROOT is constant of the path root of the system
*/
spl_autoload_extensions('.php');
spl_autoload_register('loadClasses');

function loadClasses($className)
{
    define('ROOT_DIR','/var/www/html/');
    define('DS','/');
    try {
        if (file_exists(ROOT_DIR  . 'log/' . $className . '.php')) {
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
        } elseif (file_exists(ROOT_DIR  . $className . '.php')){
            set_include_path(ROOT_DIR );
            spl_autoload($className);
        }else
        {
            throw new ISException('Class does not exist');
        }
    }
    catch(Exception $e)
    {
    echo $e;

    }
}
?>
