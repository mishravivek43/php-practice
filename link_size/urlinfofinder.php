<?php
/*
 * 
 * 
 * 
 */
 include ("urlsize.php");
 /*
if(isset($_POST['submit']))
{
		$urlobject2=new urlsize();
		$url=$_POST['url'];
		$option=$_POST['fields'];
		$data=$urlobject2->curl_data($url);
		if(empty($name))
		{
			$msg['url']="url can not be empty";
		}
		elseif ($data === false) 
		{
			echo "URL failed\n";
			
		}
		elseif($option=="web links")
		{
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
	
			$result[$j]= "URL:".$linkarray[0][$j]." contentlength: ".$contentLength."\n";
			//echo $contentLength;
			$i++;
			}
			
			
/*
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
	//echo $contentLength;
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
	//echo $contentLength;
	$i++;
}

 $i=count($linkarray[0]);
$sum = $urlobject2->human_filesize($sum,3);
echo ("the total size of url including no. of links in url\n".$url."\n");
echo "Size: ".$sum." for no. of links: ".$i."\n";
echo "total javascript links in the url\n";
print_r($linkarray2[0]);
echo "total css links in the url\n";
print_r($linkarray3[0]);

		}
		
}
*/		
?>
<html>
   
   <head>
      <title>Get URL INFO </title>
   </head>
   
   <body>
      <h1>Add url <?php echo $login_session; ?></h1> 
      <p><span class="error">* required field.</span></p>
      <form action="interlinks2.php" method="post" name="myform";?>
   URL: <input type="text" name="url" value="<?php echo $url;?>">
   <span class="error">* <?php if(isset($msg['name'])) echo $msg['url'];?></span>
   <br><br>
   
   Fields: <select name = "fields">
  <option value="web links">Web Links</option>
  <option value="Java Script links">Java Script</option>
  <option value="CSS links">CSS links</option>
  <option value="ALL">ALL</option>
</select> 
   <br><br>
   <input type="submit" name="submit" value="Submit">
   </form>
   <p>
   </p>
       </body>
   
</html>


