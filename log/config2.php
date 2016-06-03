<?php
//creating objects of sql to connect with the database
  //namespace mylogin ;
   class database2
   {
		 			   
   public $DB_SERVER ="localhost";
   public $DB_USERNAME ="vivek";
   public $DB_PASSWORD ="vivek";
   public $DB_DATABASE ="mydb";


}
 $dbobj = new database2();
   $db2 = new mysqli($dbobj->DB_SERVER,$dbobj->DB_USERNAME,$dbobj->DB_PASSWORD,$dbobj->DB_DATABASE);
   /*
   echo " hello ".$dbobj->DB_SERVER."\n";
   echo $dbobj->DB_USERNAME;
   echo $dbobj->DB_PASSWORD;
   echo $dbobj->DB_DATABASE;
   */


?>
