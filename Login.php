<?php
// define variables and set to empty values
$emailErr = $usermessage= $paswordErr = "";
$email= $userpassword= $name = $usermessage="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
      $emailErr = "Invalid email format"; 
    }
  }
    
    if (empty($_POST["password"])) 
	{
    	$paswordErr = "Password is required";
    } 
	else 
	{
    	$userpassword = test_input($_POST["password"]);
    } 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Book Store</title>
<link href="IndexCss.css" rel="stylesheet" type="text/css">
  </head>


<body>

<div class="header">
  <a href="#default" class="logo">Online Book Store</a>
  <div class="header-right">
    <a href="Index.php">Home</a>
    <a href="linkProduct.php">Books</a>
    <a href="Register.php">Sing Up</a>
    <a class="active">Log In</a>
    <a>Sign Out</a>
  </div>
</div>

    <p>&nbsp;</p>    
    <p>&nbsp;</p>    

  


<!-- InstanceBeginEditable name="Main" -->
<?php
$servername = "localhost";
$username = "root";
$password = "root";

$dbname = "onlinebookstore";
	
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
	if(!$conn)
	{
			die("Connection failed: " . mysqli_connect_error());
	}
	//("Connection Successfull");
	// *** Validate request to login to this site.
if (!isset($_SESSION)) 
	{
  	session_start();
//$email=$_SESSION['Useremail'];
	}

//echo($userpassword);
//	$email=$_POST['email'];
//	$userpassword=$_POST['password'];
	
if(isset($_POST['email']))
{
	 //  echo($email);
	
  	$sql="SELECT UserName FROM user WHERE (Email='$email' AND Password='$userpassword')"; 
	
   	
  	$UserRecord = mysqli_query($conn, $sql);  //or die(mysqli_error());
   
	$UserFound = mysqli_num_rows($UserRecord);	
	
	if ($UserFound) 
	  {
		 echo($email);
		 // output data of each row
		 while($row = mysqli_fetch_assoc($UserRecord)) 
		 {
			 $name= $row["UserName"];
			 echo($name);
		 }
	  
			//$_SESSION['Useremail'] = $email;
			$_SESSION['UserName'] = $name; 
		//	$_SESSION['Userpassword'] = $password;	      

	    
		 $usermessage = "You have successfully login to the system";

	  }
	  else
	  {
		$usermessage="Email or Password is invalid";
		
	  }
	
}

?>	

<span class="error"><?php echo 'Sign In :'. $name;?></span>
			<a href="Logout.php">Sign Out</a>
        </tr>

  </div>
  <div class="Content">
	<form id="form1" name="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		  
	<label>Login Details</label>
	<br>
	<br>
	
	<table width="745" >
	<tbody>
		
    <tr>
      <td><label>Email Address</label></td>
      <td width="350"><input type="email" name="email" id="email" width="350" value="<?php $email ?>"></td>
	  <td width="184"><span class="error">* <?php echo $emailErr;?></span></td>
    </tr>
    <tr>
      <td><label>Password</label></td>
      <td><input type="password" name="password" id="password" width="250"></td>
      <td><span class="error">* <?php echo $paswordErr;?></span></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Login"></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
		

	  </form>
<?php
	  
echo $usermessage;
	  
?>
	
	  
	
</div>
</div>


<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
