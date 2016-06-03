<?php
include ("ExportToExcel.php");
ExportExcel("userlogin");
<form name="export" method="post">
    	<input type="submit" value="Click Me!" name="submit">
</form>

<?php

if(isset($_POST["submit"]))
{
	ExportExcel("csv");
}

?>
