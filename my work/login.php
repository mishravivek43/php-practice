<?php
   //include ("config.php");
  include('SPL_auto_load.php');

   session_start();
   $dbobj2 = new config();//creating object of config class
   $db2 = new mysqli($dbobj2->DB_SERVER,$dbobj2->DB_USERNAME,$dbobj2->DB_PASSWORD,$dbobj2->DB_DATABASE);//creating database object
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db2,$_POST['username']);//taking the strings in sql format 
      $mypassword = mysqli_real_escape_string($db2,$_POST['password']); 
      if ($myusername!="mishravivek43"){
      
      $mypassword = md5($mypassword);//encryption of password using md5 
      //$password = base64_encode($password);
  }
      
      
      
      //checking user's login details in the database
      $sql2 = "SELECT userid FROM login WHERE username = '$myusername' and password = '$mypassword'";//sql query to check the authentication
      
      $result = mysqli_query($db2,$sql2);//executing query
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);//fetching query results
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);//counting no. of rows 
  echo $count;
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
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

//login form start here
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
