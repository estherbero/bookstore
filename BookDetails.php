<?php
// define variables and set to empty values
$BookID ="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //define php variable as "bookid"
  //define php value as $BookID
  $BookID=test_input($_POST["bookid"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$$servername = "localhost";
$username = "root";
$password = "root";

$dbname = "onlinebookstore";
	
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if(!$conn)
	{
			die("Connection failed: " . mysqli_connect_error());
	}

//echo($BookID);

$query_string ="SELECT `book`.`Image`, `book`.`Category`,`book`.`PublicationDate`, `author`.`AuthorName` FROM `author` INNER JOIN `book` ON `book`.`AuthorID` = `author`.`AuthorID` where `book`.`BookID`=$BookID ORDER BY `book`.`Category`";    

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
    <a href="Book.php">Online Shop</a>
    <a class="active">Shopping Cart</a>
    <a href="Register.php">Sing Up</a>
    <a href="Login.php">Log In</a>
    <a>Sign Out</a>

  </div>
</div>


    <p>&nbsp;</p>    
    <p>&nbsp;</p>    


  <div class="Content"> 
	 
  <!--Form (values) to be send (post) to next page BookInvoice.php -->
	<form name="form1" action="BookInvoice.php" method="post">
      <table width="100%" border="0" cellpadding="10">
       <?php if ($num_rows)
			{ 
				while ($a_row = mysqli_fetch_assoc($result))
    { ?>
          <tr>
          <!--php $Values need to be written in php code inside the HTML codeF-->
          <td colspan="2"><img src="<?php echo $a_row['Image'];?>" width="100" hight="100"></td>          
        </tr>
        <tr>
          <td rowspan="7"><label>Author: <?php echo($a_row['AuthorName']);?></label></td>
        </tr>
        
        <?php } } ?>
      </table>

      <label>Quantity</label><input type="text" name="quantity"><input type="hidden" name="bookid" value="<?php echo $BookID;?>">
          <input type="submit" name="submit" value="Purchase">
      </form:
      
    ><p>&nbsp;</p>	  
	
 </div>
</div>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
