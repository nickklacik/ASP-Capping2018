<?php
  require('session.php');
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$sql = "SELECT email FROM Users where email = '".$_POST['email']."'";
	$result = pg_query($conn, $sql);
	if(pg_num_rows($result) ==  0) {
	  // email doesn't exist so add it
	  $email = $_POST['email'];
	  $pass = $_POST['pass'];
	  $first = $_POST['first'];
	  $last = $_POST['last'];
	  $passwordHash = password_hash($pass, PASSWORD_DEFAULT);

	  $sql = "INSERT INTO Users (email, first_name, last_name, is_admin, password) VALUES ('".$email."', '".$first."', '".$last."', FALSE, '".$passwordHash."')";
	  echo $sql;
	  $result = pg_query($conn, $sql);
	  if($result == FALSE) {
	    echo "Error: " . pg_result_error(pg_get_result($conn));
	  } else {
	    header('Location: login.php');
	  }
	} else {
	  // email does exist 
	  echo "Sorry, that email is already used.";
	}
  } 
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="pablo.css">
  </head>
  <body>
    <?php
      require("functions.php");
      createHeader();
    ?>
	<h2 style="text-align:center">Welcome to P.A.B.L.O. Please Register</h2>
	<div id="login" style="text-align:center">
		<form action="register.php" method="POST">
		<input type="text" name="first" placeholder="First Name" required><br><br>
		<input type="text" name="last" placeholder="Last Name" required><br><br>
		<input type="email" name="email" placeholder="Email" required><br><br>
		<input type="password" name="pass" placeholder="Password" required><br><br>
		<input type="submit" name="register-submit" value="Register">
		</form>
	</div>
  </body>
</html>

