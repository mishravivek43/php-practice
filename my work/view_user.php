<?php
   include('SPL_auto_load.php');
  
$dbobj2 = new config();
$db3 = new mysqli($dbobj2->DB_SERVER,$dbobj2->DB_USERNAME,$dbobj2->DB_PASSWORD,$dbobj2->DB_DATABASE);
?>
<html">
   
   <head>
      <title>View_user </title>
   </head>
   
   <body>
      <h1>All current Users </h1> 
 <?php     
        $sql3 = "SELECT userid, username FROM login";
		$result3 = mysqli_query($db3, $sql3);

if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result3)) {
        echo "userid: " . $row["userid"]. " - Name: " . $row["username"]. "  <br>";
    }
} else {
    echo "0 results";
}
?>
      <h2><a href = "welcome.php">back to welcome</a></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>

