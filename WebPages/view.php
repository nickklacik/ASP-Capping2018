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
    <script src="view.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="pablo.css">
  </head>
  <body id="bkg2">
    <?php
      require("functions.php");
      createHeader();
    ?>
    <br>
    <div style="width: 100%; overflow: auto;">
      <div style="width: 49%; display: inline-block; float: left;">
	<img id="image" src="pablo.jpg" style="width: 100%;">
      </div>
      
      <div style="text-align: center; width: 49%; display: inline-block;">
	<br>
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
    </div>
    <br><br><br>
    <div style="width: 100%; border: 2px solid black; overflow: auto">
      <div class="imgContainer"><img src="pablo.jpg" class="containedImg" onclick="updateImage('pablo.jpg')"></div>
      <div class="imgContainer"><img src="ian.jpg" class="containedImg" onclick="updateImage('ian.jpg')"></div> 
      <div class="imgContainer"><img src="kevin.jpg" class="containedImg" onclick="updateImage('kevin.jpg')"></div> 
      <div class="imgContainer"><img src="nick.jpg" class="containedImg" onclick="updateImage('nick.jpg')"></div> 
      <div class="imgContainer"><img src="nicole.jpg" class="containedImg" onclick="updateImage('nicole.jpg')"></div> 
      <div class="imgContainer"><img src="brandon.jpg" class="containedImg" onclick="updateImage('brandon.jpg')"></div> 
    </div>
  </body>
</html>
