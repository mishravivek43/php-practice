<?php
   include('session.php');
$nameErr = $emailErr = $genderErr = $passErr = $pass2Err"";
$name = $password = $password2 = $gender = "";

?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <p><span class="error">* required field.</span></p>
      <!--<form action="<?php// echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" ;?> -->
      <form action="" method="post" ;?>
   Name: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Password: <input type="text" name="email" value="<?php echo $password;?>">
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>
   Re_type Password: <input type="text" name="website" value="<?php echo $password2;?>">
   <span class="error"><?php echo $pass2Err;?></span>
   <br><br>
   
   Gender:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit">
</form>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
     }
   }
   
   if (empty($_POST["password"])) {
     $passErr = "password is required";
   } else {
     $password = test_input($_POST["password"]);
     // check if e-mail address is well-formed
     if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
    $passErr = "the password does not meet the requirements!";
}

     }
      if (empty($_POST["Re_type Password"])) {
     $pass2Err = "password is required";
   } else {
     $password2 = test_input($_POST["Re_type Password"]);
     // check if e-mail address is well-formed
     if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,10}$/', $password2)) {
    $pass2Err = "the password does not meet the requirements!";
}
    elseif($password!=$password2){
    $pass2Err="Both password fields are not matching"
 }
   }
   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
   $sql = "INSERT INTO userlogin (id,name, password, confirmed)
VALUES (null, $name, $password, 'yes')";

if (mysqli_query($db, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
