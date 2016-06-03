<?php
/*
 * 
 * 
 */
 include('SPL_auto_load.php');

   session_start();
   $loginobj = new confirm_login();
   $dbobj = new config();
  $db2 = new mysqli($dbobj->DB_SERVER,$dbobj->DB_USERNAME,$dbobj->DB_PASSWORD,$dbobj->DB_DATABASE);
  if($_SERVER["REQUEST_METHOD"] == "POST") {
   $myusername=$_POST['username'];
   $mypassword=$_POST['password'];
  $myusername=$loginobj->input_return($myusername,$db2);
  $mypassword=$loginobj->input_return($mypassword,$db2);
   $error=$loginobj->empty_check($myusername);
   if($error=="done")
   {
		$mypassword=$loginobj->password_return($myusername,$mypassword);
   }
	else
	{
		die ("username can not be blank");
	}
	$sql2 = "SELECT userid FROM login WHERE username = '$myusername' and password = '$mypassword'";//sql query to check the authentication
	$count=$loginobj->sql_check($sql2,$db2);
	echo $count;
	$error=$loginobj->welcome2($count,$myusername);
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
               <?php // creating simple login form with post method   ?>
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
