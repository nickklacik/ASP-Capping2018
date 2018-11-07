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
      <div style="float: left; font-family: Tahoma; width: 47%; background-color: LightGray; height: 350px; text-align: center; margin-left: 15px; padding-top: 5px; border: 2px solid black; margin-bottom: 15px; "> Select image to upload:
	<input type="file" name="OriginalUpload" id="OriginalUpload">
	<p> Example:  </p> <img src="Example.jpg">
      </div>
      <div style="float: right; font-family: Tahoma; width: 47%; background-color: LightGray; height: 350px; text-align: center; margin-right: 15px; padding-top: 5px; border: 2px solid black; margin-bottom: 15px;">
        Select style to apply:
      <br>
      <br>
      <input type="radio" name="StyleUpload" value="udnie.ckpt"> Udnie Style <br>
      <input type="radio" name="StyleUpload" value="wave.ckpt"> Wave Style <br>
      <!-- <img src="udnie.jpg" onmouseover="big(this)" onmouseout="normal(this)" onclick="<input type='hidden' name='StyleUpload' value='udnie.ckpt'>" width=150px height=150px>
      <img src="wave.jpg" onmouseover="big(this)" onmouseout="normal(this)" onclick="<input type='hidden' name='StyleUpload' value='wave.ckpt'>" width=150px height=150px>
      <img src="la_muse.jpg" onmouseover="big(this)" onmouseout="normal(this)" onclick="<input type='hidden' name='StyleUpload' value='la_muse.ckpt'>" width=150px height=150px>
      <br>
      <img src="rain_princess.jpg" onmouseover="big(this)" onmouseout="normal(this)" onclick="<input type='hidden' name='StyleUpload' value='rain_princess.ckpt'>; border='5';" width=150px height=150px>
      <img src="scream.jpg" onmouseover="big(this)" onmouseout="normal(this)" onclick="<input type='hidden' name='StyleUpload' value='scream.ckpt'>" width=150px height=150px>
      <img src="shipwreck.jpg" onmouseover="big(this)" onmouseout="normal(this)" onclick="<input type='hidden' name='StyleUpload' value='wreck.ckpt'>" width=150px height=150px>
      <script>
        function big(x) {
          x.style.height = "200px";
          x.style.width = "200px";
        }

        function normal(x) {
          x.style.height = "150px";
          x.style.width = "150px";
          position = "absoulte";
        }
        function border(x) {
          border = "white";
          border = "1px";
        }
      </script>
      -->
      </div> 
      <div align=center>
	<input class="button" type="submit" value="Stylize!" name="submit">
      </div>
    </form>
    
  </body>
</html>
