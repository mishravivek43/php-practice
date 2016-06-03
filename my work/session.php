<?php
   include('SPL_auto_load.php');
/*   
spl_autoload_extensions('.php');
spl_autoload_register('loadClasses');

function loadClasses($className)
{
    define('ROOT_DIR','/var/www/html/');
    define('DS','/');
    try {
        if (file_exists(ROOT_DIR  . 'my work/' . $className . '.php')) {
            set_include_path(ROOT_DIR  . 'my work' . DS);
            spl_autoload($className);
          }elseif (file_exists(ROOT_DIR  . 'log/' . $className . '.php')) {
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
*/

session_start();

$user_check = $_SESSION['login_user'];//name of the user in the session

$ses_sql = mysqli_query($db, "select name from userlogin where name = '$user_check' ");//checking the name in the database via query

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);//fetching the query result

$login_session = $row['name'];//taking the result of query

    //if there is no session the page will be redirected to login page i.e. login .php
if (!isset($_SESSION['login_user']))
{
header("location:login.php");
}

?>
