<?php
//creating objects of sql to connect with the database
  class config
  { 
	public	$DB_SERVER ="localhost";
	public $DB_USERNAME ='root';
	public $DB_PASSWORD ='bridgeit';
	public $DB_DATABASE ='chat';
   
   //$a="localhost", $b="vivek", $c="vivek", $d="mydb"
   public function  _construct()
   {

		echo "object created\n";
	   
   }

}

  // $dbobj = new config();
  // $db = new mysqli($dbobj->DB_SERVER,$dbobj->DB_USERNAME,$dbobj->DB_PASSWORD,$dbobj->DB_DATABASE);


?>
