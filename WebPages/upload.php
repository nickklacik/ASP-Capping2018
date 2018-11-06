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
      require("functions.php");
      createHeader();
    ?>
    <br><br>
    <form action="uploadImages.php" method="post" enctype="multipart/form-data">
      <div style="float: left; font-family: Tahoma; width: 47%; background-color: LightGray; height: 300px; text-align: center; margin-left: 15px; padding-top: 5px; border: 2px solid black; margin-bottom: 15px; "> Select image to upload:
	<input type="file" name="OriginalUpload" id="OriginalUpload">
	<p> Example:  </p> <img src="Example.jpg">
      </div>
      <div style="float: right; font-family: Tahoma; width: 47%; background-color: LightGray; height: 300px; text-align: center; margin-right: 15px; padding-top: 5px; border: 2px solid black; margin-bottom: 15px;">
        Select style to apply:
	<input type="file" name="StyleUpload" id="StyleUpload">
        <p> Styles: </p> <img src="Example.jpg">
      </div> 
      <div align=center>
	<input class="button" type="submit" value="Stylize!" name="submit">
      </div>
    </form>
    
  </body>
</html>
