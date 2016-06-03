<?php
  include ("config.php");
  $dbobj = new config();
  $db2 = new mysqli($dbobj->DB_SERVER,$dbobj->DB_USERNAME,$dbobj->DB_PASSWORD,$dbobj->DB_DATABASE);
  
  $sql2 = "SELECT userid FROM login WHERE username = 'mishravivek43' and password = 'bridgeit'";//sql query to check the authentication
      
      $result = mysqli_query($db2,$sql2);//executing query
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);//fetching query results
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);//counting no. of rows 
      echo $count;

?>
