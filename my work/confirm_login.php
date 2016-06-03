<?php
/*

 * 
 * 
 * 
 */
class confirm_login //extends config
{
	//$dbobj2 = new config();//creating object of config class
   //$db2 = new mysqli($dbobj2->DB_SERVER,$dbobj2->DB_USERNAME,$dbobj2->DB_PASSWORD,$dbobj2->DB_DATABASE);//creating database object
   //public $db2
   /*
  public function _construct()//constructing database object on object creation
  {
	  $this->db2 = new mysqli($this->DB_SERVER,$this->DB_USERNAME,$this->DB_PASSWORD,$this->DB_DATABASE);//creating database object
  }
  */ 
  public function sql_check($sql2,$db2)
  {
   
      
      
      //checking user's login details in the database
      //$sql2 = "SELECT userid FROM login WHERE username = '$myusername' and password = '$mypassword'";//sql query to check the authentication
      
      $result = mysqli_query($db2,$sql2);//executing query
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);//fetching query results
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);//counting no. of rows 
  echo $count;
      // If result matched $myusername and $mypassword, table row must be 1 row
		
		return $count;
}
//redirecting to welcome page on successful login
	public function welcome2($count,$myusername)
	{
			
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
                  // echo "Login Successfully";

         header("location: welcome.php");
         //$fname="welcome.php";
      }
      else {
         
         $error = "Your Login Name or Password is invalid";
         $fname="";
         return $error;
      }
	}
	
	//remove a particular user from database
	public function remove($count,$myusername,$mypassword)
	{
		if($count == 1 && $myusername!="mishravivek43") 
		{
         $sql3="delete from login where username = '$myusername'" ;
         $result2 = mysqli_query($this->db2,$sql3);
         //$_SESSION['login_user'] = $myusername;
         $error= "User removed Successfully";

         //header("location: welcome.php");//redirecting to welcome page on successful login
         //$fname="welcome.php";
      }	elseif($myusername!="mishravivek43")
			{
                 $error = "can not remove administrator";		  
			}
      
      else {
         
         $error = "Your Login Name or Password is invalid";
         //$fname="";
	 }
         return $error;
      }
//taking input from post method	
	public function input_return($input,$db2)
	{
		 
			 
		
      // username and password sent from form 
      
      $input = mysqli_real_escape_string($db2,$input);//taking the strings in sql format 
      
      return $input;
  
      
  }
	
	//taking password as input and encrypting it
	public function password_return($myusername,$mypassword)
	{
		
		//$mypassword = $this->input_return();
		//$msg=$this->passwordcheck($mypassword,$myusername);
		//if($msg="done")
		//{//
      //$mypassword = mysqli_real_escape_string($this->db2,$_POST['password']); 
      if ($myusername!="mishravivek43"){
      
      $mypassword = md5($mypassword);//encryption of password using md5 
      //$password = base64_encode($password);
      
  }
//}//
//else
//{//
	//$mypassword="false";
//}	//
  return $mypassword;
	}

  //to check the input is empty or not
public function empty_check($input)
{
	 if(empty($input))//checking if field is blank or not
		{
			$msg = 'field can not be blank';
			
		}
	else
		{
			$msg ="done";
		}	
		return $msg;
}
//to check input credentials are alphabets or not
public function alphacheck($input)
{
	if (!preg_match("/^[a-zA-Z ]*$/",$input))
		{
			$msg='only alphabets are allowed';
			
		}
	else
		{
			$msg ="done";
		}	
		return $msg;
}

//to check input credentials are alphanumeric or not
public function alphanumcheck($input)
{
	if (!preg_match("/^[a-zA-Z0-9]*$/",$input))//checking the posted username is eligible or not
		{
			$msg='only alphanumeric characters are allowed';
			
		}
	else
		{
			$msg ="done";
		}	
		return $msg;
}	

//to check password is strong compatible or not 
//to compatible it must be alphanumeric (charcters included) and between 8-25 characters
//after this check, the password is encrypted 
public function passwordcheck($password,$myusername)
{
	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,25}$/', $password))
		{
			$msg ='the password must be alphanumeric 8-25characters!';
			
		}
	else
		{
			$msg ="done";
		}
		return $msg;
}	
//to check email_ids in proper format or not
public function email_check()
{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
       $msg = 'Invalid email format';
     }
     else
		{
			$msg ="done";
		}
		return $msg;
}
//to check entered date are in proper format or not i.e. yyyy-mm-dd
public function datecheck()
{
	
   //cheking for valid date format
   
	$date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';
		

	if (!preg_match($date_regex, $DOB)) 
	{
		$msg ='Your hire date entry does not match the YYYY-MM-DD required format.';
	} 
	else 
	{
		$msg="done";     
	}
		return $msg;
}
}

?>

