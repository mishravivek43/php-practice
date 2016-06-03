<?php
include('SPL_auto_load.php');
	class utility
		{
	        public function check_input($data)
	        {
				if (empty($data))
				{
					die ("the field can not be empty");
				}
			    else 
			    {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				} 
		
			}
	          
	          public function check_alphanum($data)
	          {
					if (!preg_match("/^[a-zA-Z0-9]*$/",$data))//checking the posted data is alphanumeric or not
					{
						die ('only alphanumeric characters are allowed');
					}
					else
					return $data;
				}
			  public function check_password($data)
			  {
					if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,30}$/', $data))
					{
						die ('the password must be alphanumeric 8-30characters!');
					}
			  }	
		}
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
