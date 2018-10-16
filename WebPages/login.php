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
        <span class="headerLink" onclick="window.location.href = 'register.php'">Register</span>
      </div>
    </div>
	<h2 style="text-align:center">Welcome to P.A.B.L.O. Please Login</h2>
	<div id="login" style="text-align:center">
		<form action="login.php" method="POST">
		<input type="email" name="email" placeholder="Email" required><br><br>
		<input type="password" name="pass" placeholder="Password" required><br><br>
		<input type="submit" name="login-submit" value="Login">
		</form>
	</div>
  </body>
</html>

