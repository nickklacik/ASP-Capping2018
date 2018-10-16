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
    <br>
    <div style="width: 100%">
      <div style="width: 50%; float: left;">
        <img id="image" src="newyork.jpg" style="width: 100%;">
      </div>
      &nbsp
    </div>
    <br>
    <div style="text-align: center;">
      <span class="button" onclick="alert('Buy')">
        Buy It Now!
      </span>
      <br><br><br>
      <span class="button" onclick="alert('View Image')">
        View Full Image
      </span>
      <br><br><br>
      <span class="button" onclick="alert('Print')">
        Print Image
      </span>
      <br>
    </div>
  </body>
</html>
