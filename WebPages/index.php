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
    <link rel="icon" href="logo.png">
  </head>
  <body id=bkg2>
    <?php
      if (isset($_SESSION['login_user'])) {
	$sql = "SELECT first_name FROM Users WHERE email = '".$_SESSION['login_user']."'";
	$result = pg_query($conn, $sql);
	if (pg_num_rows($result) == 1) {
	  $row = pg_fetch_assoc($result);	
          echo "<b><span style='font-family:Tahoma;font-size:15px;color:white;text-align:right;position:absolute'> &nbsp Welcome, " . $row['first_name'] . "</span></b>";
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
        Choose a style
      </div>
      <div style="width: 5%; float: left;"> &nbsp </div>
      <div style="font-family: Tahoma; font-size: 15px; width: 30%; float: left; text-align: center;">
        Create a Styled Image
      </div>
    </p>
    <br>
    <p>
      <div style="width: 30%; float: left;">
        <img id="OGImage" src="redd.jpg" style="width: 100%;">
      </div>
      <div class="spacer">
        +
      </div>
      <div style="width: 30%; float: left;">
        <img src="thewave.jpg" style=" width: 100%">
      </div>
      <div class="spacer">
        =
      </div>
      <div style="width: 30%; float: left;">
        <img src="redstyle.jpg" style="width: 100%">
      </div>
      &nbsp
    </p>
    <br><br><br>
    <div style="text-align: center;">
      <span class="button"  onclick="window.location.href = 'upload.php'">
        Try it out!
      </span>
    </div>
  </body>
</html>
