<?php
   session_start();
   //redirect the page to login page
   if(session_destroy()) {
      header("Location: login.php");
   }
?>

