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
      
      .button {
        text-align: center; 
        background-color: orange; 
        border: 2px solid black; 
        font-size: 24px; 
        width: 200px; 
        padding: 10px
      }
      
      .button:hover {
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
      </div>
    </div>
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
