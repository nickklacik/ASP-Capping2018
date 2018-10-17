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
