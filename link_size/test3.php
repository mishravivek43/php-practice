<?php

namespace App\Http\Controllers;

use \DOMDocument;

 class UrlController extends urlsize
 {

   public function get_content($url,$linkarray4)
   {
     if(!empty($linkarray[0][0]))
     {
     $sum=0;
     $n=count($linkarray4[0]);
     for($j=0;$j<$n;$j++)
     {
       if(!empty($linkarray2[0][$j]))
       {
      $contentLength=$this->get_size($url.$linkarray3[0][$j]);
      $temp=$this->human_filesize($contentLength,3);
      //echo $temp."\n";
      if($contentLength=='unknown')
      {
        $contentLength=0;
      }
      $sum+=(int)$contentLength;

     echo "URL:".$url.$linkarray3[0][$j]." contentlength: ".$contentLength."\n";
      //echo $contentLength;
    
      ?>
      <br><br>
      <?php
      
    }
     }
     return $sum;
   }
   }




   public function url()
	 {
		 //$url=$_POST['url'];
 		//$option=$_POST['fields'];
 		$url="http://google.com";

 $linkarray[]=$this->link_colllect($url);
 $sum=$this->get_size($url);
 $linkarray2[]=$this->js_colllect($url);
 $linkarray3[]=$this->css_colllect($url);
 $i=0;
 echo "Total Links in the given url:$url";
 ?>
   <br><br>
   <?php
$sum+=$this->get_content($url,$linkarray);
$sum+=$this->get_content($url,$linkarray2);
$sum+=$this->get_content($url,$linkarray3);   
/*
 if(!empty($linkarray[0][0]))
 {

 $n=count($linkarray[0]);

 for($j=0;$j<$n;$j++)
 {
 	$contentLength=$this->get_size($linkarray[0][$j]);
 	$temp=$this->human_filesize($contentLength,3);
 	//echo $temp."\n";
 	if($contentLength=='unknown')
 	{
 		$contentLength=0;
 	}
 	$sum+=(int)$contentLength;

 	echo "URL:".$linkarray[0][$j]." contentlength: ".$contentLength."\n";
 //	echo $contentLength;
  ?>
   	<br><br>
   	<?php
 	$i++;
 }
 }
if(!empty($linkarray2[0][0]))
{
  echo "Total javascript links in the given url:$url";
  ?>
    <br><br>
    <?php
 $n=count($linkarray2[0]);
 for($j=0;$j<$n;$j++)
 {
   if(!empty($linkarray2[0][$j]))
   {
 	$contentLength=$this->get_size($url.$linkarray2[0][$j]);
 	$temp=$this->human_filesize($contentLength,3);
 	//echo $temp."\n";
 	if($contentLength=='unknown')
 	{
 		$contentLength=0;
 	}
 	$sum+=(int)$contentLength;

 	echo "URL:".$url.$linkarray2[0][$j]." contentlength: ".$contentLength."\n";
 	//echo $contentLength;
  ?>
   	<br><br>
   	<?php
 	$i++;
 }

 }
 }
 if(!empty($linkarray3[0][0]))
 {
   echo "Total CSS Links in the given url:$url";
   ?>
     <br><br>
     <?php
 $n=count($linkarray3[0]);
 for($j=0;$j<$n;$j++)
 {
 	$contentLength=$this->get_size($url.$linkarray3[0][$j]);
 	$temp=$this->human_filesize($contentLength,3);
 	//echo $temp."\n";
 	if($contentLength=='unknown')
 	{
 		$contentLength=0;
 	}
 	$sum+=(int)$contentLength;

 echo "URL:".$url.$linkarray3[0][$j]." contentlength: ".$contentLength."\n";
 	//echo $contentLength;
  ?>
 	<br><br>
 	<?php
 	$i++;
 }
}
*/
  $i=count($linkarray[0]);
 $sum = $this->human_filesize($sum,3);
 echo ("the total size of url including no. of links in url\n".$url."\n");
 ?>
 <br><br>
 <?php  ?>
  	<br><br>
  	<?php
 echo "Size: ".$sum." for no. of links: ".$i."\n";
 ?>
 <br><br>
 <?php
 echo "total javascript links in the url\n";
 ?>
  <br><br>
  <pre>
  <?php

 print_r($linkarray2[0]);
 echo "total css links in the url\n";
 print_r($linkarray3[0]);
 ?>
  <br><br>
</pre>
  <?php
	 }
   


 	}//ending class


//gghg

?>
