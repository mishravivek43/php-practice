<?php
   //include('config.php');


session_start();

$user_check = $_SESSION['login_user'];//name of the user in the session

$ses_sql = mysqli_query($db, "select name from userlogin where name = '$user_check' ");//checking the name in the database via query

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);//fetching the query result

$login_session = $row['name'];//taking the result of query

    //if there is no session the page will be redirected to login page i.e. login .php
if (!isset($_SESSION['login_user']))
{
header("location:login.php");
}

?>
