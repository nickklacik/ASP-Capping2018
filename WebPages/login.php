<?php
require('session.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // verify user email
  $sql = "SELECT email FROM Users WHERE email = '".$_POST['email']."'";  
  $result = pg_query($conn, $sql);
  if(pg_num_rows($result) == 1) {
    $_SESSION['login_user'] = $_POST['email'];
    echo $_SESSION['login_user'] . "<br>";
    echo $_POST['email'];
    // verify password
    $sql = "SELECT password FROM Users WHERE email = '".$_POST['email']."'";
    $result = pg_query($conn, $sql);
    if(pg_num_rows($result) == 1) {
      $row = pg_fetch_assoc($result);
      $storedPass = $row['password'];
      $pass = $_POST['pass'];
	 
      if(password_verify($pass, $storedPass)) {
        header('Location: index.php');
      }
    } else {
	echo "Invalid Username or Password";
    }
  }	
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="pablo.css">
  </head>
  <body id="bkg1" >
    <?php
      require("functions.php");
      createHeader();
    ?>
	<div id="login" >
		<h1 id=h1> Please Login: </h1>
		<form action="login.php" method="POST">
		<input type="email" name="email" placeholder="Email" required><br><br>
		<input type="password" name="pass" placeholder="Password" required><br><br>
		<input type="submit" name="login-submit" value="Login"><br><br>
		</form>
		<a href='register.php'>New User? Register here.</a>
	</div>
  </body>
</html>

