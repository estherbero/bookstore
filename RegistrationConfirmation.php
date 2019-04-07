<?php
// define variables and set to empty values
if (!isset($_SESSION)) {
  session_start();
}

	$name=$_SESSION['UserName'];
	$comment=$_SESSION['Comment']; 

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
</div>
	<span class="error"><?php echo 'Sign In :'. $name;?></span>
	<form id="form1" name="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<label><?php echo $comment;?></label>
    </form>
</div>
</body>
</html>