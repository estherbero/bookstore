<?php
// define variables and set to empty values
$BookID = $quantity="";


/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
  $BookID=test_input($_POST["bookid"]);
  $quantity=test_input($_POST["quantity"]);*/


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
    <a href="Login.php">Log In</a>
    <a class="active" href="#Shopping Cart">Shopping Cart</a>
    <a>Sign Out</a>
    
  </div>
</div>


 <p>&nbsp;</p>
 <p>&nbsp;</p>


<div style="padding-left:20px">
  <h1>Payment Confirmation</h1>
</div>

  <div class="Content"> 
	  
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

echo(test);

//echo($BookID);
$timestamp = date('Y-m-d');
	   echo($timestamp);
$description="Purchase book";
if (!isset($_SESSION)) 
	{
  	session_start();
		
	$userid=$_SESSION['UserID'];
	$username=$_SESSION['UserName'];
    $email=$_SESSION['Email'];
	$bookID=$_SESSION['BookID'];
	$quantity=$_SESSION['Quantity'];
	$price=$_SESSION['Price'];
		
	}
echo(test2);

$query_string ="INSERT INTO `order (`OrdDate`, `OrderDescription`, `BookID`, `Qty`, `Amount`, `UserID`) VALUES ('$timestamp','$description',$bookID,$quantity,$price,$userid)";

echo($email);
echo($userid);
echo(test3);

 echo($query_string);
	  
if (mysqli_query($conn, $query_string))
	{
  		$comment= "Congratulation " .$username. ". Your purchase has been confirm. You will receive an email regarding your purchase and delivery details";
		
	$Body=<<<EOT
 	Hi $username,<br>
 	Wellcome to our Online Book Shop. Your Order details are as follows:<br> 
 	Book ID:$bookID<br> Quantity:$quantity<br>Unit Price:$price<br>Total Price:$quantity*$price<br> You will receive your book in your postal address within 10 working days<br> Regards<br>Sales Team<br>Online Book Shop;
 
EOT;
	$subject="Purchase book";
	$header="IJahan@kent.edu.au";
		
		mail($email,$Subject,$Body,$header);
		//mail("ishrat_pbl@yahoo.com","Purchasing Book","Dear Ishrat,\nhdgfhfdgdfjhg");
	} 
	else

	{
		echo(test4); $comment= "Error: " . $$query_string  . "<br>" . mysqli_error($conn);
	} 

	  echo($comment);
?>	  
	
 </div>
</div>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
