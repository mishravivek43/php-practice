<?php
   include('SPL_auto_load.php');

//calling diffrent pages for different tasks

?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
       <a href="add_user.php" target="_blank">Add Users</a>
       <br><br>
        <a href="view_user.php" target="_blank">View Users</a>
        <br><br>  
        <a href="export.php" target="_blank">Export Users</a>
        <br><br>  
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>

