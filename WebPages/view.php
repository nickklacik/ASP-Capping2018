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
  <body id=bkg2>
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
        <span class="button" onclick="order()">
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
      <?php 
        $sql = "SELECT preview_path, Photo_id, Upload_Date FROM Photos WHERE email='".$_SESSION['login_user']."' ORDER BY Upload_Date DESC";
        $result = pg_query($conn, $sql);
        if($row = pg_fetch_row($result)){
          $src = $row[0];
          $id = $row[1];
          if(stripos($src, "..") === 0) $src = "image.php?img=" . $src;
          echo "<script> updateImage('$src', $id) </script>";
	        echo "<div class=\"imgContainer\"><img src=\"$src\" class=\"containedImg\" onclick=\"updateImage('$src', $id)\"></div>";
        }
        while($row = pg_fetch_row($result)){
          $src = $row[0];
          $id = $row[1];
          if(stripos($src, "..") === 0) $src = "image.php?img=" . $src;
          echo "<div class=\"imgContainer\"><img src=\"$src\" class=\"containedImg\" onclick=\"updateImage('$src', $id)\"></div>"; 
        }
      ?>
    </div>
  </body>
</html>
