<?php
// define variables and set to empty values
$nameErr = $passwordErr = $genderErr = $addressErr = $suburbErr = $comment = $stateErr = $countryErr ="";
$email = $name = $userpassword = $gender = $address = $state = $suburb = $postcode = $country = $phone = $mobile = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["password"])) {
    $emailErr = "Password is required";
   } else {
    $userpassword = test_input($_POST["password"]);
    
  }
    
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
    
  }

  if (empty($_POST["suburb"])) {
    $suburbErr = "Suburb is required";
  } else {
    $suburb = test_input($_POST["suburb"]);
  }
	
	if (empty($_POST["postcode"])) {
    $postcode = "";
  } else {
    $postcode = test_input($_POST["postcode"]);
  }
	
  if (empty($_POST["state"])) {
  $stateErr = "State is required";
  } else {
    $state = test_input($_POST["state"]);
  }
	
	if (empty($_POST["country"])) {
    $countryErr = "Country is required";
  } else {
    $country = test_input($_POST["country"]);
  }
	

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
	
	if (empty($_POST["phone"])) {
    $phone = "";
  } else {
    $phone = test_input($_POST["phone"]);
  }
	
	if (empty($_POST["mobile"])) {
    $mobile = "";
  } else {
    $mobile = test_input($_POST["mobile"]);
  }
	
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "root";

$dbname = "onlinebookstore";
	
$conn = mysqli_connect($servername, $username, $password,$dbname);

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['name'])) {
  
	$email=$_SESSION['Useremail'];
	
	echo($email);
 

 
  $sql = "INSERT INTO user (UserName, Password, Street, Suburb, Postcode, State, Country, Gender, Email,Phone,Mob) VALUES('$name', '$userpassword', '$address', '$suburb', $postcode, '$state', '$country', '$gender', '$email','$phone','$mobile')";

	if (mysqli_query($conn, $sql))
	{
  		$comment= "Congratulation " .$name. ". Your registration has been successfull";
		
		
	} 
	else
	{
		$comment= "Error: " . $sql . "<br>" . mysqli_error($conn);
	} 
   $_SESSION['UserName']=$name;
   $_SESSION['Comment']=$comment;
 
   header( "location:RegistrationConfirmation.php" );
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


 <div class="Content">
	<form id="form1" name="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  
	<label>Stage 2 of 2 Registration Details</label>
	<br>
	<br>
	
	<label>Personal Details</label>
	<br>
	<br>
	<table width="745">
	<tbody>
    <tr>
      <td><label>User Name</label></td>
      <td width="350"><input type="text" name="name" id="name" width="350"></td>
	  <td width="184"><span class="error">* <?php echo $nameErr;?></span></td>
    </tr>
    <tr>
      <td><label>Password</label></td>
      <td><input type="password" name="password" id="password" width="250"></td>
      <td><span class="error">* <?php echo $passwordErr;?></span></td>
    </tr>
	<tr>
      <td><label>Address</label></td>
      <td width="350"><input type="text" name="address" id="address" width="350"></td>
	  <td width="184"><span class="error">* <?php echo $addressErr;?></span></td>
    </tr>
	<tr>
      <td><label>Suburb</label></td>
      <td width="350"><input type="text" name="suburb" id="suburb"></td>
	  <td width="184"><span class="error">* <?php echo $suburbErr;?></span></td>
    </tr>
	<tr>
      <td><label>Postcode</label></td>
      <td width="350"><input type="text" name="postcode" id="postcode"></td>
	  <td width="184"></td>
    </tr>
	<tr>
      <td><label>State</label></td>
      <td width="350"><input type="text" name="state" id="state"></td>
	  <td width="184"><span class="error">* <?php echo $stateErr;?></span></td>
    </tr>	
    
	<tr>
      <td><label>Country</label></td>
      <td width="350">
		  <select name="country" id="country">
		  				<option value=""></option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value=" Afganistan">Afganistan</option>
                        <option value="Algeria">Algeria</option>
                        <option value="America">America</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Barma">Barma</option>
                        <option value="China">China</option>
                        <option value="Singapur">Singapur</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Philipine">Philipine</option>
              </select>
		</td>
	  <td width="184"><span class="error">* <?php echo $countryErr;?></span></td>
    </tr>
	<tr>
      <td><label>Gender</label></td>
      <td width="350"><p>
        <label>
          <input type="radio" name="gender" value="Male" id="gender_0">
          Male</label>
        
        <label>
          <input type="radio" name="gender" value="Female" id="gender_1">
          Female</label>
		 <label>
          <input type="radio" name="gender" value="Other" id="gender_2">
          Other</label> 
      </p></td>
	  <td width="184"><span class="error">* <?php echo $genderErr;?></span></td>
    </tr>
	<tr>
      <td><label>Phone</label></td>
      <td width="350"><input type="tel" name="phone" id="phone"></td>
	  <td width="184"></td>
    </tr>
	<tr>
      <td><label>Mobile</label></td>
      <td width="350"><input type="number" name="mobile" id="mobile"></td>
	  <td width="184"></td>
    </tr>
		
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Submit"></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

    </form>
	 	  
	
  </div>
</div>

</body>
</html>


