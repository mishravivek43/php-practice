<?php
/*
 * 
 * 
 */


  //include('session.php');
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
	$path = '/var/www/html/log/';

	include $path.$className.'.php';
}
session_start();
$dbobj2 = new config();
$db3 = new mysqli($dbobj2->DB_SERVER,$dbobj2->DB_USERNAME,$dbobj2->DB_PASSWORD,$dbobj2->DB_DATABASE);
$user=$_SESSION['login_user'];
if(isset($_POST['submit']))
{
		$chat=$_POST['chat'];
		if(empty($chat))
		{
			$msg['chat']='chat is blank';
		}
		
		else
		{	
			$user = mysqli_real_escape_string($db3,$user);
			$chat = mysqli_real_escape_string($db3,$chat);
			//echo $chat;
		//$password = encryptIt($password);
		
		//$password = base64_encode($password);
		$sql = "INSERT INTO `chatstore` (`id`,`user_name`, `talk`)
VALUES (null, '$user', '$chat')";

if (mysqli_query($db3, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


		}
			 	
		
		
}



?>
<html">
   
   <head>
      <title>add_chat </title>
   </head>
   
   <body>
	   <h1>current User
      <?php 
      echo $user ;?></h1> 
      <h1>Add your chat message <?php echo $login_session; ?></h1> 
      <p><span class="error">* required field.</span></p>
      <form id = "frm1" action="" method="post" name="myform";?>
   chat: <input type="text"  name="chat" value="<?php echo $chat;?>">
   <span class="error">* <?php if(isset($msg['chat'])) echo $msg['chat'];?></span>
   <br><br>
   
   
   <br><br>
   <input type="submit"  name="submit" value="Submit">
   
</form>
<button onclick="myFunction()">Try it</button>
<p id="demo"></p>
<script>
function myFunction() {
    var x = document.forms["frm1"];
    var text = "";
    var i;
    //documeny.write("this is javascript output");
    for (i = 0; i < x.length-1 ;i++) {
        text += x.elements[i].value + "<br>";
    }
    document.getElementById("demo").innerHTML = text;
}
</script>
      <h2><a href = "welcome.php">back to welcome</a></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>
