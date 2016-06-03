<?php
//creating objects of sql to connect with the database
  class config
  { 
	public	$DB_SERVER ='localhost';
	public $DB_USERNAME ='root';
	public $DB_PASSWORD ='bridgeit';
	public $DB_DATABASE ='works';
   
   //$a="localhost", $b="vivek", $c="vivek", $d="mydb"
   public function  _construct()
   {

		echo "object created\n";
	   
   }

}
  /*
  $dbobj = new config();
  $db = new mysqli($dbobj->DB_SERVER,$dbobj->DB_USERNAME,$dbobj->DB_PASSWORD,$dbobj->DB_DATABASE);
        $sql3 = "SELECT userid, username FROM login";
		$result3 = mysqli_query($db, $sql3);

if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result3)) {
        echo "userid: " . $row["userid"]. " - Name: " . $row["username"]. "  <br>";
    }
} else {
    echo "0 results";
}
*/
?>
