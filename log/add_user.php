<?php
   //include('session.php');
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
	$path = '/var/www/html/log/';

	include $path.$className.'.php';
}
$dbobj2 = new config();
$db3 = new mysqli($dbobj2->DB_SERVER,$dbobj2->DB_USERNAME,$dbobj2->DB_PASSWORD,$dbobj2->DB_DATABASE);
if(isset($_POST['submit']))
{
		$name=$_POST['name'];
		if(empty($name))
		{
			$msg['name']='Name is blank';
		}
		elseif (!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$msg['name']='only alphabets are allowed';
		}
		else
		{
			$input['name']="done";
		}
			 	
		$password=$_POST['password'];
		if(empty($password))
		{
			$msg['password']='password is blank';
		}
		elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,10}$/', $password))
		{
			$msg['password']='the password must be alphanumeric 8-10characters!';
		}
		
		$password2=$_POST['password2'];
		if(empty($password2))
		{
			$msg['password2']='password is blank';
		}
		elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,10}$/', $password))
		{
			$msg['password2']='the password must be alphanumeric 8-10characters!';
		}
		elseif($password!=$password2)
		{
			$msg['password2']='Both passwords are not matching';
		}
		else
		{
			$input['password']="done";
		}
		
		$gender=$_POST['gender'];
		if(empty($gender))
		{
			$msg['gender']='Gender is blank';
		}
		$name = mysqli_real_escape_string($db,$name);
		$password = mysqli_real_escape_string($db,$password);
		//$password = encryptIt($password);
		$password = md5($password);
		//$password = base64_encode($password);
		$sql = "INSERT INTO `userlogin` (`id`,`name`, `password`)
VALUES (null, '$name', '$password')";
if ($input['password']==$input['name'] && $input['name']=="done")
{ 
if (mysqli_query($db3, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else
{
	echo "input credentials are not correct";
}
}



?>
<html">
   
   <head>
      <title>add_user </title>
   </head>
   
   <body>
      <h1>Add user information <?php echo $login_session; ?></h1> 
      <p><span class="error">* required field.</span></p>
      <form id = "frm1" action="" method="post" name="myform";?>
   Name: <input type="text"  name="name" value="<?php echo $name;?>">
   <span class="error">* <?php if(isset($msg['name'])) echo $msg['name'];?></span>
   <br><br>
   
   Password: <input type="password" name="password" value="<?php echo $password;?>">
   <span class="error">* <?php if(isset($msg['password'])) echo $msg['password'];?></span>
   <br><br>
   
   Re_type Password: <input type="password" name="password2" value="<?php echo $password2;?>">
   <span class="error">* <?php if(isset($msg['password2'])) echo $msg['password2'];?></span>
   <br><br>
   
   Gender:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
   <span class="error">* <?php if(isset($msg['gender'])) echo $msg['gender'];?></span>
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


