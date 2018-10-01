<!doctype html>
<html>
  <head>
    <meta charset="UTF-8"/>
  </head>
  <body>
    <div style="height: 150px; width: 100%;">
      <div style="text-align: center; height: 100px; background-color: white;">
        <img src="KND.jpg" width="182px" height="100px">
      </div>
      <div style="text-align: center; line-height: 50px; height: 50px; background-color: orange;
        border: 2px solid black;">
        <div style="display: inline; padding: 10px;" onclick="alert('home')">Home</div>
        <div style="display: inline; padding: 10px;" onclick="alert('about')">About</div>
        <div style="display: inline; padding: 10px;" onclick="alert('view')">View</div>
        <div style="display: inline; padding: 10px;" onclick="alert('help')">Help</div>
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
<?php
  if (!empty($_POST['login-submit'])) {
	echo "<p style='text-align:center'>Invalid Username or Password</p>";
  } 
?>