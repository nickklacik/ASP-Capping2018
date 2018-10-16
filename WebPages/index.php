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
    <style>
      .spacer {
        width: 5%;
        float: left;
        text-align: center;
      }
      
      .headerLink {
        padding: 10px;
      }
      
      .headerLink:hover {
        background-color: DarkOrange;
      }
      
      #try {
        text-align: center; 
        background-color: orange; 
        border: 2px solid black; 
        font-size: 24px; 
        width: 200px; 
        padding: 10px
      }
      
      #try:hover {
        background-color: DarkOrange; 
      }
    </style>
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
	<span class="headerLink" onclick="window.location.href = 'register.php'">Register</span>
      </div>
    </div>
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
      <span id="try" onclick="window.location.href = 'login.php'">
        Try it out!
      </span>
    </div>
  </body>
</html>
