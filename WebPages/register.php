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
  </head>
  <body>
    <div style="height: 150px; width: 100%;">
      <div style="text-align: center; height: 100px; background-color: white;">
        <img src="Knd.jpg" width="182px" height="100px">
      </div>
      <div style="text-align: center; line-height: 50px; height: 50px; background-color: orange;
        border: 2px solid black;">
        <span class="headerLink" onclick="window.location.href = 'index.php'">Home</span>
        <span class="headerLink" onclick="alert('about')">About</span>
        <span class="headerLink" onclick="window.location.href = 'view.php'">View</span>
        <span class="headerLink" onclick="alert('help')">Help</span>
	<span class="headerLink" onclick="window.location.href = 'login.php'">Login</span>
	
      </div>
    </div>
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

