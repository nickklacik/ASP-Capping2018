<?php
require('session.php');
  if(empty($_SESSION['login_user'])) {
     header('Location: login.php');	
  }
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Pastyle</title>
    <script src="index.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="pablo.css">
  </head>
  <body id=bkg2>
    <?php
      if (isset($_SESSION['login_user'])) {
	$sql = "SELECT first_name FROM Users WHERE email = '".$_SESSION['login_user']."'";
	$result = pg_query($conn, $sql);
	if (pg_num_rows($result) == 1) {
	  $row = pg_fetch_assoc($result);	
          echo "<b><span style='font-family:Tahoma;font-size:15px;text-align:right;position:absolute'>Welcome, " . $row['first_name'] . "</span></b>";
	}
      }
      require("functions.php");
      createHeader();
    ?>
    <p>
      <div style="font-family: Tahoma; font-size:15px; width: 30%; float: left; text-align: center;">
        Upload a photo
      </div>
      <div style="font-family: Tahoma; font-size: 15px; width: 5%; float: left;"> &nbsp </div>
      <div style="font-family: Tahoma; font-size: 15px; width: 30%; float: left; text-align: center;">
        Upload a style
      </div>
      <div style="width: 5%; float: left;"> &nbsp </div>
      <div style="font-family: Tahoma; font-size: 15px; width: 30%; float: left; text-align: center;">
        Create a Styled Image
      </div>
    </p>
    <br>
    <p>
      <div style="width: 30%; float: left;">
        <img id="OGImage" src="newyork.jpg" style="width: 100%;">
      </div>
      <div class="spacer">
        +
      </div>
      <div style="width: 30%; float: left;">
        <img src="brushstrokes.jpg" style=" width: 100%">
      </div>
      <div class="spacer">
        =
      </div>
      <div style="width: 30%; float: left;">
        <img src="newyork_brushstrokes_preservecolor.jpg" style="width: 100%">
      </div>
      &nbsp
    </p>
    <br><br><br>
    <div style="text-align: center;">
      <span class="button" onclick="window.location.href = 'upload.php'">
        Try it out!
      </span>
    </div>
  </body>
</html>
