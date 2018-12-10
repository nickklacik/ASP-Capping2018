<?php
require('session.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // verify user email
  $sql = "SELECT email FROM Users WHERE email = '".$_POST['email']."'";  
  $result = pg_query($conn, $sql);
  if(pg_num_rows($result) == 1) {
    $_SESSION['login_user'] = $_POST['email'];
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
      else {
	$_SESSION['login_error'] = "Invalid username or password";
      } 
    }
  } else {
      $_SESSION['login_error'] = "Invalid username or password";
  }
  // Check if user is admin
  $sql = "SELECT email from Users where email = '".$_POST['email']."' AND is_Admin = 't'"; 
  $result = pg_query($conn, $sql);
  if(pg_num_rows($result) == 1) {
    $_SESSION['is_admin'] = true;	  
  }
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="pablo.css">
    <link rel="icon" href="logo.png">
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
		<a href='register.php'>New User? Register here.</a><br><br>
	
	<?php
	  if(isset($_SESSION['login_error'])) {
	    echo $_SESSION['login_error'];
	    unset($_SESSION['login_error']);
	  }
	?>
	</div>
  </body>
</html>

