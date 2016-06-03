<?php
//namespace magicworld;
//require '/var/www//html/php_oop/magic.class.php';
include('magic.class.php');
class human extends magic
{
	public function _construct()
	{
	parent::_construct();
	}
	function _toString()
	{
		echo "your objects default values are now:\n";
		echo "HP : ".$this->HP."\n";
		echo "Attack : ".$this->attack."\n";
		echo "HP : ".$this->defence."\n";
	}
	
	function __get($name)
	{
		echo "__get executed with name $name ";
	}
	
	function __set($name , $value)
	{
		echo "__set executed with name $name , value $value";
	}
	
	function __call($name , $parameter)
	{
		$a = print_r($parameter , true); //taking recursive array in string
		echo "__call executed with name $name , parameter $a";
	}
	
	static function __callStatic($name , $parameter)
	{
		$a = print_r($parameter , true); //taking recursive array in string
		echo "__callStatic executed with name $name , parameter $a";
	}
	
}
$human1 = new human();
$human2 = new human();

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
magic::fight($human1,$human2);//static function calling
?>
