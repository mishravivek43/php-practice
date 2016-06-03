<?php
require '/var/www//html/php_oop/magic.class.php';
require '/var/www//html/php_oop/human.php';
$human1 = new \magicworld\human();
$human2 = new \magicworld\human();
echo "give stats to your first player attack, hp, defence and name \n";
$a = readline("");
$b = readline("");
$c = readline("");
$d = readline("");
$human1->setplayer($a,$b,$c,$d);

echo "give stats to your second player attack, hp, defence and name \n";
$a = readline("");
$b = readline("");
$c = readline("");
$d = readline("");
$human2->setplayer($a,$b,$c,$d);

echo "let's see who wins";
\magicworld\magic::fight($human1,$human2);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>untitled</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.25" />
</head>

<body>
	
</body>

</html>
