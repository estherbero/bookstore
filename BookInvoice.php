<?php
// define variables and set to empty values
$BookID = $quantity="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
  $BookID=test_input($_POST["bookid"]);
  $quantity=test_input($_POST["quantity"]);
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
// Check connection
if(!$conn)
	{
			die("Connection failed: " . mysqli_connect_error());
	}

//echo "string";
//echo($BookID);
//echo ($quantity)

$query_string ="SELECT `book`.`Image`, `book`.`Category`, `book`.`Price`,`book`.`PublicationDate`, `author`.`AuthorName` FROM `author` INNER JOIN `book` ON `book`.`AuthorID` = `author`.`AuthorID` where `book`.`BookID`=$BookID ORDER BY `book`.`Category`";    
//echo $BookID;
//echo $query_string;
$result=mysqli_query($conn,$query_string);
 
$num_rows =mysqli_num_rows($result);

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


<div style="padding-left:20px">
  <h1>Your cart</h1>
</div>

  <div class="Content"> 
	  
	<form name="form1" action="Payment.php" method="post">
      <table width="50%" border="1" cellpadding="10" align="center">
      <tr>
          <td width="27%" colspan="2"><strong>Product Ordered</strong></td>
          <td width="15%" colspan="2"><strong>Quantity</strong></td>
          <td width="22%" colspan="2"><strong>Unit Price</strong></td>
          <td width="36%" colspan="2" align="right"><strong>Cost</strong></td>
        </tr>
       <?php if ($num_rows)
			{ 
				while ($a_row = mysqli_fetch_assoc($result))
            { ?>
          <tr>
          <td width="27%" colspan="2"><img src="<?php echo $a_row['Image'];?>"></td>
          <td width="15%" colspan="2"><?php echo $quantity;?></td>
          <!-- <td width="15%" colspan="2"><input value="<?php echo $quantity;?>"></td>-->
         <td width="22%" colspan="2"><?php echo $a_row['Price'];?></td>
         <td width="36%" colspan="2">$
          <?php 
	 		$cost=$quantity*$a_row['Price'];
	 		echo($cost)
		  ?>
          </td>
          
        </tr>
        
        <tr>
          <td width="27%" colspan="2"</td>
          <td width="15%" colspan="2"</td>
          <td width="22%" colspan="2" align="right"><strong>GST</strong></td>
          <td align="right">
          
          	$ <?php
				$gst = 0.1 * $cost;
				echo number_format($gst, 2);
			?>          
       </td>
        </tr>
        <tr>
          <td width="27%" colspan="2"</td>
          <td width="15%" colspan="2"</td>
          <td width="22%" colspan="2" align="right"><strong>Grand Total</strong></td>
          <td align="right">
          
          $ <?php
		  	$grand = $cost + $gst;
			echo number_format($grand, 2);
		  ?>          </td>
        </tr>
         <?php 
			if (!isset($_SESSION)) 
			{
  			session_start();
     		$_SESSION['BookID']=$BookID;
			$_SESSION['Quantity']=$quantity;
			$_SESSION['Price']=$a_row['Price'];
				
			}
			 
			} } ?>
        <tr>
          <td width="27%" colspan="2"</td>
          <td width="15%" colspan="2"</td>
          <td width="22%" colspan="2" align="right"><strong>Continue to</strong></td>
          <td colspan="2" style="font-size: 30" ><input style="font-size: 40" type="submit" name="submit" value="Payment"> </td>
        </tr>
	  </table>
      
      </form:
      
    ><p>&nbsp;</p>	  
	
 </div>
</div>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
