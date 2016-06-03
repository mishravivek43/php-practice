$hostname = "localhost";
$username = "vivek";
$password = "vivek";
$database = "mydb";

$conn = mysql_connect("$hostname","$username","$password") or die(mysql_error());
mysql_select_db("$database", $conn) or die(mysql_error());
