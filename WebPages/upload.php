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
      require("functions.php");
      createHeader();
    ?>
    <br><br>
    <!-- Form allows user to upload an image and then select a style -->
    <form action="uploadImages.php" method="post" enctype="multipart/form-data">
    <div style="float: left; font-family: Tahoma; width: 47%; background-color: LightGray; height: 350px; text-align: center; margin-left: 15px; padding-top: 5px; border: 2px solid black; margin-bottom: 15px; "> Select image to upload:
      <input type="file" name="OriginalUpload" id="OriginalUpload" onchange="readURL(this);">
        <br><br><br><br><br>
        <!-- Image uploaded is displayed inside the div -->
        <img id="UserUpload" src="#" alt="Preview your image here!" align="center" width="120px" height="auto"/>
        <script>
          // Reads user input on change and changes image source to the image uploaded
          function readURL(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  document.getElementById('UserUpload').src=e.target.result;
              }
              reader.readAsDataURL(input.files[0]);
            }
          }
        </script>
    </div>
      <!-- Div containing the default styles that the user can select -->
    <div style="float: right; font-family: Tahoma; width: 47%; background-color: LightGray; height: 350px; text-align: center; margin-right: 15px; padding-top: 5px; border: 2px solid black; margin-bottom: 15px;">
        Select style to apply:
      <br>
      <br>
      <label>
        <input type="radio" name="StyleUpload" value="udnie.ckpt">
        <img src="udnie.jpg" width=150px height=150px>
      </label>
      <label>
        <input type="radio" name="StyleUpload" value="wave.ckpt">
        <img src="wave.jpg" width=150px height=150px>
      </label>
      <label>  
        <input type="radio" name="StyleUpload" value="la_muse.ckpt">
        <img src="la_muse.jpg" width=150px height=150px>
      </label>
      <br>
      <label>
        <input type="radio" name="StyleUpload" value="rain_princess.ckpt">
        <img src="rain_princess.jpg" width=150px height=150px>
      </label>
      <label>
        <input type="radio" name="StyleUpload" value="scream.ckpt"> 
        <img src="scream.jpg" width=150px height=150px>
      </label>
      <label>
        <input type="radio" name="StyleUpload" id= "Style6" value="wreck.ckpt">
        <img src="shipwreck.jpg" id="styleSelect" width=150px height=150px>
      </label>
    </div> 
    <div align=center>
      <!-- Stylize your image -->
	    <input class="button" type="submit" value="Stylize!" name="submit">
    </div>
    </form>
  </body>
</html>
