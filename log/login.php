<?php
  // include("config.php");
//set_include_path(get_include_path().PATH_SEPARATOR.'/var/www/html/log/');
//spl_autoload_extensions('.php, .inc');
//spl_autoload_register();
/*
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $path = '/var/www/html/log/';

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
   session_start();
   $dbobj2 = new config();
   $db = new mysqli($dbobj2->DB_SERVER,$dbobj2->DB_USERNAME,$dbobj2->DB_PASSWORD,$dbobj2->DB_DATABASE);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);//tking the strings in sql format 
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      if ($myusername!="vivek"){
      //$mypassword = encryptIt($mypassword);
      $mypassword = md5($mypassword);//encryption of password using md5 
      //$password = base64_encode($password);
  }
      //$passwordcheck= decryptIT($passwordcheck)
      //$sql = "SELECT password FROM userlogin WHERE name = '$myusername'";
      //$passwordcheck= mysqli_query($db,$sql);
      //$passwordcheck= decryptIT($passwordcheck);
      //if ($passwordcheck==$mypassword)
      
      //checking user's login details in the database
      $sql2 = "SELECT id FROM userlogin WHERE user_name = '$myusername' and password = '$mypassword'";
      
      $result = mysqli_query($db,$sql2);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
  
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register($myusername);
         $_SESSION['login_user'] = $myusername;
                  // echo "Login Successfully";

         header("location: welcome.php");//redirecting to welcome page on successful login
         //$fname="welcome.php";
      }
      else {
         $error = "Your Login Name or Password is invalid";
         $fname="";
      }
   }


?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#4ccc26; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
