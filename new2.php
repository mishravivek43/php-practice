<?php
//the following commented codes are for spl_autoload methods which includes all .php
//files in the given directory



/*
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $path = '/var/www/html/php_oop/';

    include $path.$className.'.php';
}
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
            throw new Exception('Class does not exist');
        }
    }
    catch(Exception $e)
    {
        echo $e;

    }
}
//-------------------------------------
/*
 * one more method to add path 
set_include_path(get_include_path().PATH_SEPARATOR.'path/to/my/directory/');
spl_autoload_extensions('.php, .inc');
spl_autoload_register();
*/
//$myClass = new MyClass();
//require '/var/www//html/php_oop/filelog.php';
//$obj1 = new \log\logfile();
$obj1 = new logfile2();
$obj1->writefile("myfile.txt","hello bhai");
$reads=$obj1->readfile("myfile.txt");
echo $reads;
?>
