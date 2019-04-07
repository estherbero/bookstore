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
$query_string = "SELECT `book`.`BookID`,`book`.`Image`, `book`.`Category`,`book`.`PublicationDate`, `author`.`AuthorName` FROM `author`
    INNER JOIN `book` ON `book`.`AuthorID` = `author`.`AuthorID` 
    ORDER BY `book`.`Category`";

$result=mysqli_query($conn,$query_string);

$num_rows = mysqli_num_rows($result);
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
    <a class="active">Online Shop</a>
    <a href="Register.php">Sing Up</a>
    <a href="Login.php">Log In</a>
    <a>Sign Out</a>
    
  </div>
</div>

    <p>&nbsp;</p>    
    <p>&nbsp;</p>   


  <div>
   <form name="form1" action="BookDetails.php" method="post">
<?php while ($a_row = mysqli_fetch_assoc($result))
    { ?>
      <table width="30%" border="0" cellpadding="10">
        <tr>
          <td colspan="2"><img src="<?php echo $a_row['Image'];?>" width="100" hight="100"></td>
        </tr>
        <tr>
          <td rowspan="7"><label>Author: <?php echo($a_row['AuthorName']);?></label> 
          </td>        
        </tr>
        <tr>
          <td rowspan="7"><label>Category: <?php echo($a_row['Category']);?></label> 
          </td>        
        </tr>
        <tr>
          <input type="hidden" name="bookid" value="<?php echo ($a_row['BookID']);?>">
        </tr>
      </table>
      <input type="submit" name="submit" value="purchase" border="0"> 
      <?php } ?>
    <p>&nbsp;</p>	  
   </form>
	
 </div>
</div>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
