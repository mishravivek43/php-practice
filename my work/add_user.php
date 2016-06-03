<?php
   include('SPL_auto_load.php');
  
$dbobj2 = new config();//creating config object
$db3 = new mysqli($dbobj2->DB_SERVER,$dbobj2->DB_USERNAME,$dbobj2->DB_PASSWORD,$dbobj2->DB_DATABASE);//creating database object
if(isset($_POST['submit']))
{
		$name=$_POST['name'];
		if(empty($name))//checking if field is blank or not
		{
			$msg['name']='Name is blank';
		}
		elseif (!preg_match("/^[a-zA-Z0-9]*$/",$name))//checking the posted username is eligible or not
		{
			$msg['name']='only alphanumeric usernames are allowed';
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
		elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,30}$/', $password))
		{
			$msg['password']='the password must be alphanumeric 8-30characters!';
		}
		
		$password2=$_POST['password2'];
		if(empty($password2))
		{
			$msg['password2']='password is blank';
		}
		elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,30}$/', $password))
		{
			$msg['password2']='the password must be alphanumeric 8-30characters!';
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
		 
		 $email=$_POST["email_id"];
		 if (empty($email)) {
     $msg['email'] = 'Email is required';
   } else {
     
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $msg['email'] = 'Invalid email format';
     }else
		{
			$input['email']="done";
		}
   }
   
   $DOB=$_POST["DOB"];
   		 if (empty($DOB)) {
     $msg['DOB'] = 'Date of Birth is required';
   } else {
   //cheking for valid date format
   
	$date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';
		

	if (!preg_match($date_regex, $DOB)) {
		$msg['DOB'] ='Your hire date entry does not match the YYYY-MM-DD required format.';
	} else {
		$input['DOB']="done";     
	}
}
	
		$name = mysqli_real_escape_string($db3,$name);
		$password = mysqli_real_escape_string($db3,$password);
		//$password = encryptIt($password);
		$password = md5($password);
		//$password = base64_encode($password);
		$sql = "INSERT INTO `login` (`userid`,`username`, `Password`,`email_id`,`DOB`)
VALUES (null, '$name', '$password','$email','$DOB')";
if ($input['password']==$input['name'] && $input['email']==$input['name'] && $input['name']==$input['DOB'] &&$input['DOB']=="done")
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
   email_id: <input type="text"  name="email_id" value="<?php echo $name;?>">
   <span class="error">* <?php if(isset($msg['email'])) echo $msg['email'];?></span>
   <br><br>
   DateOfBirth: <input type="date"  name="DOB" value="<?php echo $name;?>">
   <span class="error">* <?php if(isset($msg['DOB'])) echo $msg['DOB'];?></span>
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


