<?php
/*
*
*
 * 
 * 
 */
include ("urlsize.php");

$urlobject2=new urlsize();
$url="http://stackoverflow.com/";
//$url="http://google.com/";
//$url="http://facebook.com";
//$url="http://bridgelabz.com";
//$url="http://w3schools.com";
$linkarray[]=$urlobject2->link_colllect($url);
$sum=$urlobject2->get_size($url);

$i=0;

foreach($linkarray as $link)
{
	
	$contentLength=$urlobject2->get_size($link[0]);
	echo $urlobject2->human_filesize($contentLength,3)."\n";
	if($contentLength=='unknown')
	{
		$contentLength=0;
	}
	$sum+=(int)$contentLength;
	
	print_r($link);
	echo $contentLength;
	$i++;
}
 $i=count($linkarray[0]);
$sum = $urlobject2->human_filesize($sum,3);
echo ("the total size of url including no. of links in url\n".$url."\n");
echo "Size: ".$sum." for no. of links: ".$i."\n";


?>
