<?php
//use mylogin as my;
 //include('session.php');
 //include('config2.php');
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $path = '/var/www/html/log/';

    include $path.$className.'.php';
}

class export
{

function export_csv($tablename,$db2)
{
$filename = '/var/www/html/log/uploads/'.strtotime("now").'.csv';
//$sql = mysqli_real_escape_string($db,$tablename);
//$tablename = mysqli_real_escape_string($db,$tablename);
$sql = "SELECT * FROM ".$tablename." ";
$result = mysqli_query($db2, $sql);
$num_rows = mysqli_num_rows($result);
echo 'yyy:' + $num_rows;
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
	echo "Your file is ready. You can download it from <a href='/var/www/html/log/uploads/$filename'>here!</a>";
}
else
{
	echo "There is no record in your Database";
}	
}

}
$exp = new export();
$tablename="userlogin";
$dbobj2 = new config();
$db3 = new mysqli($dbobj2->DB_SERVER,$dbobj2->DB_USERNAME,$dbobj2->DB_PASSWORD,$dbobj2->DB_DATABASE);
$exp->export_csv($tablename,$db3);	
//echo " hello ".$dbobj->DB_SERVER."\n";
?>	
