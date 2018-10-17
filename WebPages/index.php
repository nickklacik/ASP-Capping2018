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
  <body>
    <?php
      require("functions.php");
      createHeader();
    ?>
    <p>
      <div style="width: 30%; float: left; text-align: center;">
        Upload a photo
      </div>
      <div style="width: 5%; float: left;"> &nbsp </div>
      <div style="width: 30%; float: left; text-align: center;">
        Upload a style
      </div>
      <div style="width: 5%; float: left;"> &nbsp </div>
      <div style="width: 30%; float: left; text-align: center;">
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
