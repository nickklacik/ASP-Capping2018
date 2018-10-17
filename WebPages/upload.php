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
    <div style="height: 150px; width: 100%;">
      <div style="text-align: center; height: 100px; background-color: white;">
        <img src="pastyle.png" width="182px" height="100px">
      </div>
      <div style="text-align: center; line-height: 50px; height: 50px; background-color: orange;
        border: 2px solid black;">
        <span class="headerLink" onclick="window.location.href = 'index.php'">Home</span>
        <span class="headerLink" onclick="alert('about')">About</span>
        <span class="headerLink" onclick="window.location.href = 'view.php'">View</span>
        <span class="headerLink" onclick="alert('help')">Help</span>
        <span class="headerLink" onclick="window.location.href = 'logout.php'">Logout</span>
        
      </div>
    </div>
    <br><br>
    <form action="uploadImages.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="OriginalUpload" id="OriginalUpload"><br><br>
        Select style to upload:
        <input type="file" name="StyleUpload" id="StyleUpload"><br><br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
    
  </body>
</html>
