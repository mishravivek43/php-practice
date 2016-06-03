<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'vivek');
   define('DB_PASSWORD', 'vivek');
   define('DB_DATABASE', 'mydb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


$nameErr = $emailErr = $genderErr = $passErr = $pass2Err"";
$name = $password = $password2 = $gender = "";

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
