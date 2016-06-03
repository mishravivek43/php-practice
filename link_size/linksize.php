<?php
$remoteFile = 'localhost/myphp.zip';
//$remoteFile = 'www.google.com';
//$remoteFile = "/var/www/html/app/form3.php";
//$remoteFile = 'http://blog.stackoverflow.com/';
$ch = curl_init($remoteFile);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); //not necessary unless the file redirects (like the PHP example we're using here)
$data = curl_exec($ch);
curl_close($ch);
if ($data === false) {
  echo 'cURL failed';
  exit;
}

$contentLength = 'unknown';
$status = 'unknown';
if (preg_match('/^HTTP\/1\.[01] (\d\d\d)/', $data, $matches)) {
  $status = (int)$matches[1];
}
if (preg_match('/Content-Length: (\d+)/', $data, $matches)) {
  $contentLength = (int)$matches[1];
}

function human_filesize($bytes, $decimals = 2) {
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}
//$contentLength = human_filesize($contentLength,3);
 
 
   
   
    if($contentLength=='unknown')
    {
		echo "unknown file size\n";
		$contentLength = @filesize($file->filepath);
		//$contentLength=getSize($remoteFile);
	}
	
	$contentLength = human_filesize($contentLength,3);
echo 'HTTP Status: ' . $status . "\n";
echo 'Content-Length: ' . $contentLength;
?>
