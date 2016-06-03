<?php
//namespace magicworld;
class magic
{
	protected $attack;
	protected $HP ;
	protected $defence;
	protected $name="player";
	
	public function setplayer($a,$b,$c,$d)
	{
		$this->attack = $a;
		$this->HP = $b;
		$this->defence= $c;
		$this->name=$d;
	echo "the player has been set"; 
	}
	
	public function _construct()
	{
		$this->attack = 50;
		$this->HP = 500;
		$this->defence= 40;
		echo "the player has been created\n"; 
	}
	function _toString()
	{
		echo "your player".$this->name." default values are now:\n";
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
	// attack fuction  
	private function attack($act2)
	{
		$a=(int) $act2->HP;
		$b=(int) $act2->defence;
		$c=(int) $this->attack;
		if($c-$b>0)
		{
			$a=$a-$c+$b;
		}
		$act2->HP= (int) $a;
	}
	
	//fight function
	public static function fight($act1,$act2)
	{
		do
		{
			$res=rand(1,10);
			if($res>5)
			{
			$act1->attack($act2);
			}
			else
			{
			$act2->attack($act1);
			}
			
		}
		while($act1->HP>0&&$act2->HP>0);
		if($act2->HP<=0)
		{
			echo "player".$act1->name."wins\n";
			
		}
		else
		{
			echo "player".$act2->name."wins\n";
		}
		//echo $act1;
		//echo $act2;
	}
	
}
