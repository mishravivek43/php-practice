<html>
<title>all reqired url's</title>
<h1>all URl and data</h1>
<body>


<?php
/*
*
*
 * 
 * 
 */
include ("urlsize.php");
if(isset($_POST['submit']))
{
		$urlobject2=new urlsize();
		$url=$_POST['url'];
		$option=$_POST['fields'];
//$urlobject2=new urlsize();
//$url="http://stackoverflow.com/";
//$url="http://bridgelabz.com/";
//$url="http://google.com/";
//$url="http://facebook.com";
//$url="http://bridgelabz.com";
//$url="http://w3schools.com";
$linkarray[]=$urlobject2->link_colllect($url);
$sum=$urlobject2->get_size($url);
$linkarray2[]=$urlobject2->js_colllect($url);
$linkarray3[]=$urlobject2->css_colllect($url);
$i=0;
$n=count($linkarray[0]);

for($j=0;$j<$n;$j++)
{
	$contentLength=$urlobject2->get_size($linkarray[0][$j]);
	$temp=$urlobject2->human_filesize($contentLength,3);
	//echo $temp."\n";
	if($contentLength=='unknown')
	{
		$contentLength=0;
	}
	$sum+=(int)$contentLength;
	
	echo "URL:".$linkarray[0][$j]." contentlength: ".$contentLength."\n";
	echo $contentLength;
	?>
	<br><br>
	<?php
	$i++;
}

$n=count($linkarray2[0]);
for($j=0;$j<$n;$j++)
{
	$contentLength=$urlobject2->get_size($url.$linkarray2[0][$j]);
	$temp=$urlobject2->human_filesize($contentLength,3);
	//echo $temp."\n";
	if($contentLength=='unknown')
	{
		$contentLength=0;
	}
	$sum+=(int)$contentLength;
	
	echo "URL:".$url.$linkarray2[0][$j]." contentlength: ".$contentLength."\n";
	echo $contentLength;
	?>
	<br><br>
	<?php
	$i++;
}
$n=count($linkarray3[0]);
for($j=0;$j<$n;$j++)
{
	$contentLength=$urlobject2->get_size($url.$linkarray3[0][$j]);
	$temp=$urlobject2->human_filesize($contentLength,3);
	//echo $temp."\n";
	if($contentLength=='unknown')
	{
		$contentLength=0;
	}
	$sum+=(int)$contentLength;
	
	echo "URL:".$url.$linkarray3[0][$j]." contentlength: ".$contentLength."\n";
	?>
	<br><br>
	<?php
	//echo $contentLength;
	$i++;
}

 $i=count($linkarray[0]);
$sum = $urlobject2->human_filesize($sum,3);
echo ("the total size of url including no. of links in url\n".$url."\n");
?>
	<br><br>
	<?php
echo "Size: ".$sum." for no. of links: ".$i."\n";
?>
	<br><br>
	<?php
echo "total javascript links in the url\n";
?>
	<br><br><pre>
	<?php
print_r($linkarray2[0]);
echo "total css links in the url\n";
print_r($linkarray3[0]);

}
?>
</pre>
</body>
</html>
