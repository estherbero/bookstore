<?php
// define variables and set to empty values
/*$BookID = $quantity="";


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

$dbname = "bookstore";
	
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if(!$conn)
	{
			die("Connection failed: " . mysqli_connect_error());
	}


//echo($BookID);

$query_string ="SELECT `book`.`Image`, `book`.`Category`, `book`.`Price`,`book`.`PublicationDate`, `author`.`AuthorName` FROM `author` INNER JOIN `book` ON `book`.`AuthorID` = `author`.`AuthorID` where `book`.`BookID`=$BookID ORDER BY `book`.`Category`";    

$result=mysqli_query($conn,$query_string);

$num_rows =mysqli_num_rows($result);
*/
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
  <h1>Credit Card Details</h1>
</div>

 <p>&nbsp;</p>




  <div class="Content"> 
	  
	<form method="post" name="form1"  action="ConfirmPayment.php">


    <table border="0" align="center" width="60%">

        <tr >
            <td > Credit Card Number<span style="color:red"> * </span> </td>
            <td ><input type="text" id="cardnumber" name="cardnumber" size="12" oninput="allnumeric(document.form2.cardnumber)"></td>
            <td style="width:30px; height:30px">
                <img src="images/Visacard.png" width="30px" height="30px">
                <img src="images/mastercard.png" width="30px" height="30px">
                <img src="images/Amex.png" width="30px" height="30px">
                <img src="images/dinersclub.png" width="30px" height="30px"></td>
        </tr>
        <tr >
            <td style="width:150px"> Name on card<span style="color:red"> * </span> </td>
            <td style="width:200px"><input type="text" id="name" name="name" size="40"></td>
        </tr>
        <tr>
            <td style="width:150px"> Expiry Date<span style="color:red"> * </span> </td>
            <td style="width:150px">
                <p> Expiry date
                <select id="month" title="select a month">
                    <option value="0">Enter month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                </p>
            </td>
            <td style="width:150px">
                <p>
                <select id="year" title="select a year">
                    <option value="0">Enter year</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                </select>
            </p>
        </tr>
        <tr>
            <td style="width:150px"> Security number<span style="color:red"> * </span> </td>
            <td style="width:150px"><input type="text" id="securitynumber" name="securitynumber" size="3" oninput="allnumeric(document.form2.securitynumber)"></td>
        </tr>
        <tr>
            <td><input type="button" name="back"  value="Back" id="back" onclick= "document.location.href='BookInvoice.php'">
            <input type="submit" name="pay"  value="Pay Now" id="pay">
            <input type="button" name="cancel"  value="Cancel" id="cancel" onclick= "document.location.href='home.php'"></td>

        </tr>

    </table>
</form>

      
    <p>&nbsp;</p>	  
	
 </div>
</div>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
