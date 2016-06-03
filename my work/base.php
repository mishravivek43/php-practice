<?php
   include('session.php');
   include('config.php');
$filename = '/var/www/html/log/uploads/'.strtotime("now").'.csv';

$sql = "SELECT * FROM userlogin";
$result = mysqli_query($db, $sql);
$num_rows = mysqli_num_rows($result);
if($num_rows >= 1)
{
	$row = mysqli_fetch_assoc($result);
	$fp = fopen($filename, "w+");
	$seperator = "";
	$comma = "";

	foreach ($row as $name => $value)
		{
			$seperator .= $comma . '' .str_replace('', '""', $name);
			$comma = ",";
		}

	$seperator .= "\n";
	fputs($fp, $seperator);

	mysqli_data_seek($result, 0);
	while($row = mysqli_fetch_assoc($result))
		{
			$seperator = "";
			$comma = "";

			foreach ($row as $name => $value)
				{
					$seperator .= $comma . '' .str_replace('', '""', $value);
					$comma = ",";
				}

			$seperator .= "\n";
			fputs($fp, $seperator);
		}

	fclose($fp);
	echo "Your file is ready. You can download it from <a href='$filename'>here!</a>";
}
else
{
	echo "There is no record in your Database";
}



?>
<html">
   
   <head>
      <title>Export_user </title>
   </head>
   
   <body>
      <h1>All current Users </h1> 
 <?php   
	/*	
		$myfile = fopen("test.txt","a+");
        $sql4 = "SELECT id, name FROM userlogin";
		$result4 = mysqli_query($db, $sql4);

if (mysqli_num_rows($result4) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result4)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "  <br>";
        echo fwrite($myfile,$row["id"],$row["name"]);
    }
} else {
    echo "0 results";
}*/
?>
      <h2><a href = "welcome.php">back to welcome</a></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>
