<?php
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $path = '/var/www/html/php_oop/';

    include $path.$className.'.php';
}

//-------------------------------------

//$myClass = new MyClass();
//require '/var/www//html/php_oop/filelog.php';
//$obj1 = new \log\logfile();
$obj1 = new logfile();
$obj1->writefile("myfile.txt","hello bhai");
$reads=$obj1->readfile("myfile.txt");
echo $reads;
?>
