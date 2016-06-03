<?php
/*
 * 
 * 
 * 
 */

 function js_colllect($url)
	{
		
$linkarray[] = array();
// Load the HTML into a DOMDocument
$doc = new DOMDocument;
@$doc->loadHTMLFile($url);

// Look for all the 'script' elements
$links = $doc->getElementsByTagName('script');

$numLinks = 0;
foreach ($links as $link) {

    

    
    $href = $link->getAttribute('src');

   
    $linkarray[$numLinks]=$href;
    $numLinks++;
	echo $numLinks;
}
		return $linkarray;
		//return $links;
	}
	
	function css_colllect($url)
	{
		//$pUrl = parse_url($url);
$linkarray[] = array();
// Load the HTML into a DOMDocument
$doc = new DOMDocument;
@$doc->loadHTMLFile($url);

// Look for all the 'a' elements
$links = $doc->getElementsByTagName('link');

$numLinks = 0;
foreach ($links as $link) {

    

    
    $href = $link->getAttribute('href');

    
    //echo 'URL: ' . $link->getAttribute('href') . "\n";
    $linkarray[$numLinks]=$href;
    $numLinks++;
	echo $numLinks;
}
		return $linkarray;
		//return $links;
	}
	$url="http://localhost/link_size/test.html";
	//$url="http://stackoverflow.com/";
	//$url="http://google.com";
	$linkarray[]=js_colllect($url);
	$linkarray2[]=css_colllect($url);
	print_r($linkarray[0]);
		print_r($linkarray2[0]);
	
?>
