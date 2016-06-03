<?php
/*
*
*
 *
 *
 */

 class UrlController extends Controller
 {

	 public function url()
	 {
		 $url=$_POST['url'];
 		//$option=$_POST['fields'];
 //$urlobject2=new urlsize();
 //$url="http://stackoverflow.com/";
 //$url="http://bridgelabz.com/";
 //$url="http://google.com/";
 //$url="http://facebook.com";
 //$url="http://bridgelabz.com";
 //$url="http://w3schools.com";
 $linkarray[]=$this->link_colllect($url);
 $sum=$this->get_size($url);
 $linkarray2[]=$this->js_colllect($url);
 $linkarray3[]=$this->css_colllect($url);
 $i=0;
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
 	echo $contentLength;
 	?>
 	<br><br>
 	<?php
 	$i++;
 }

 $n=count($linkarray2[0]);
 for($j=0;$j<$n;$j++)
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
 	echo $contentLength;
 	?>
 	<br><br>
 	<?php
 	$i++;
 }
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
 	?>
 	<br><br>
 	<?php
 	//echo $contentLength;
 	$i++;
 }

  $i=count($linkarray[0]);
 $sum = $this->human_filesize($sum,3);
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
	 public function curl_data($remotefile)
 	{
 		$ch = curl_init($remotefile);
 		curl_setopt($ch, CURLOPT_NOBODY, true);
 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 		curl_setopt($ch, CURLOPT_HEADER, true);
 		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); //not necessary unless the file redirects (like the PHP example we're using here)
 		$data = curl_exec($ch);
 		curl_close($ch);
 		return $data;
 	}
 	//gives size of the url provided
 	public function get_size($remoteFile)
 	{
 		$contentLength = 'unknown';
 		$data=$this->curl_data($remoteFile);
 		if ($data === false)
 		{
 			echo "cURL failed\n";
 			$contentLength='unknown';
 		}



 		//matches with the regex pattern for given HTTP: url and returns the match
 		if (preg_match('/Content-Length: (\d+)/', $data, $matches))
 		{
 			$contentLength = (int)$matches[1];
 		}
 			return $contentLength;
 	}
 	//gives status of the url provided
 	public function get_status($remotefile)
 	{
 		$status = 'unknown';
 		$data=$this->curl_data($remotefile);
 		if ($data === false)
 		{
 			echo 'cURL failed';
 			exit;
 		}
 		//matches with the regex pattern for given HTTP: url and returns the match
 		if (preg_match('/^HTTP\/1\.[01] (\d\d\d)/', $data, $matches))
 		{
 			$status = (int)$matches[1];
 			return $status;
 		}
 	}
 	//returns size in readable format
 	public function human_filesize($bytes, $decimals = 2)
 	{
 		$sz = 'BKMGTP';
 		$factor = floor((strlen($bytes) - 1) / 3);
 		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
 	}

 	public function link_colllect($url)
 	{
 		$pUrl = parse_url($url);

 		// Load the HTML into a DOMDocument
 		$doc = new DOMDocument;
 		@$doc->loadHTMLFile($url);

 		// Look for all the 'a' elements
 		$links = $doc->getElementsByTagName('a');

 		$numLinks = 0;
 		foreach ($links as $link)
 		{

 			// Exclude if not a link or has 'nofollow'
 			preg_match_all('/\S+/', strtolower($link->getAttribute('rel')), $rel);
 			if (!$link->hasAttribute('href') || in_array('nofollow', $rel[0]))
 			{
 				continue;
 			}

 			// Exclude if internal link
 			$href = $link->getAttribute('href');

 			if (substr($href, 0, 2) === '//')
 			{
 				// Deal with protocol relative URLs as found on Wikipedia
 				$href = $pUrl['scheme'] . ':' . $href;
 			}

 			$pHref = @parse_url($href);
 			if (!$pHref || !isset($pHref['host']) || strtolower($pHref['host'])
 			=== strtolower($pUrl['host']))
 			{
 				continue;
 			}

 			// Increment counter otherwise
 			//echo 'URL: ' . $link->getAttribute('href') . "\n";
 			$linkarray[]=$link->getAttribute('href');
 			$numLinks++;
 			//echo $numLinks;
 		}
 			return $linkarray;
 	}
 	public function js_colllect($url)
 	{

 		$linkarray[] = array();
 		// Load the HTML into a DOMDocument
 		$doc = new DOMDocument;
 		@$doc->loadHTMLFile($url);

 		// Look for all the 'script' elements
 		$links = $doc->getElementsByTagName('script');

 		$numLinks = 0;
 		foreach ($links as $link)
 		{

 			$href = $link->getAttribute('src');

 			if (!empty($href))
 			{
 				$linkarray[$numLinks]=$href;
 			}
 			$numLinks++;
 			//echo $numLinks;
 		}
 			return $linkarray;
 			//return $links;
 	}

 	public function css_colllect($url)
 	{
 		//$pUrl = parse_url($url);
 		$linkarray[] = array();
 		// Load the HTML into a DOMDocument
 		$doc = new DOMDocument;
 		@$doc->loadHTMLFile($url);

 		// Look for all the 'link' elements
 		$links = $doc->getElementsByTagName('link');

 		$numLinks = 0;
 		foreach ($links as $link)
 		{

 			$href = $link->getAttribute('href');

 			//echo 'URL: ' . $link->getAttribute('href') . "\n";
 			if (!empty($href))
 			{
 				$linkarray[$numLinks]=$href;
 			}
 			$numLinks++;
 			//echo $numLinks;
 		}
 			return $linkarray;
 			//return $links;

 	}//ending function css collect


 	}//ending class

 


?>
</pre>
</body>
</html>
