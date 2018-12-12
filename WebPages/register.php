<?php
  require('session.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // check that passwords match
  if ($_POST['pass'] != $_POST['confpass']) {
    $_SESSION['register_error'] = "Sorry, passwords do not match.";	  
  } else {
      $pass = $_POST['pass'];
      // check that password meets requirements
      preg_match('@[A-Z]@', $pass, $uppercase);
      preg_match('@[a-z]@', $pass, $lowercase);
      preg_match('@[0-9]@', $pass, $number);
      preg_match('/[?:.*!@#$%^&*()\-_=+{};:,<.>]/', $pass, $special);
      if(empty($uppercase) || empty($lowercase) || empty($number) || empty($special) || strlen($pass) < 8) {
        $_SESSION['register_error'] = "Password does not meet requirements";
      } else { 	  
        $sql = "SELECT email FROM Users where email = '".$_POST['email']."'";
        $result = pg_query($conn, $sql);
        if(pg_num_rows($result) ==  0) {
        // email doesn't exist so add it
          $email = $_POST['email'];
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
           $_SESSION['register_error'] = "Sorry, that email is already used.";
       }
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
  <body id=bkg1>
    <?php
      require("functions.php");
      createHeader();
    ?>
	<div id="login" style="text-align:center">
		<h1 id=h1>Please Register: </h1>
		<form action="register.php" method="POST">
		<input type="text" name="first" placeholder="First Name" required><br><br>
		<input type="text" name="last" placeholder="Last Name" required><br><br>
		<input type="email" name="email" placeholder="Email" required><br><br>
		<p style="font-family: Tahoma; font-size: 11px;"> Password requirements: At least 1 uppercase letter, number, special character, and minimum of 8 characters </p>
		<input type="password" name="pass" placeholder="Password" required><br><br>
		<input type="password" name="confpass" placeholder="Confirm Password" required><br><br>
		<input type="submit" name="register-submit" value="Register">
		</form>
		<?php 
      		  if(!empty($_SESSION['register_error'])) {
		    echo "<br>" . $_SESSION['register_error'];
		    unset($_SESSION['register_error']);
		  }
		?>
	</div>
  </body>
</html>

