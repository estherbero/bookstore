<?php
// define variables and set to empty values
$emailErr = $usermessage= "";
//$email=  $password = $usermessage="";

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
    <a class="active">Sing Up</a>
    <a href="Login.php">Log In</a>
    <a>Sign Out</a>
  </div>
</div>



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
	}



if(isset($email))
{
	  
        $_SESSION['Useremail'] = $email;
		
	
  	$sql="SELECT * FROM user WHERE (Email='$email')"; 
 
	 
	
  	$UserRecord = mysqli_query($conn, $sql); // or die(mysqli_error());
  
	
   	$UserFound = mysqli_num_rows($UserRecord);
	
	 if ($UserFound) 
	  {
	  
	    
		 $usermessage = "You are already registered to the system";

	  }
	  else
	  {
	
		 header("location:RegistrationDetails.php");
	  }
	
}

?>	




<div class="Content">
	<form id="form1" name="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		  
  <p>&nbsp;</p>

	<label>Stage 1 of 2 Registration Details</label>
  <p>&nbsp;</p>

	
	<table width="745" >
	<tbody>
		
    <tr>
      <td><label>Email Address</label></td>
      <td width="350"><input type="email" name="email" id="email" width="350" ></td>
	  <td width="184"><span class="error">* <?php echo $emailErr;?></span></td>
    </tr>
      
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Submit"></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
		

	  </form>
<?php
	  
echo $usermessage;
	  
?>
	
	 

</body>
</html>