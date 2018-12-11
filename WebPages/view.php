<?php
require('session.php');
  if(empty($_SESSION['login_user'])) {
    header('Location: login.php');
  }
?>
<!doctype html>
<html>
  <head>
    <!--CanvasPop API-->
    <div id="cp-store-root" data-cp-settings='{ "access_key": "2018f14870776764ef3f8d5a35ba24f1" }'></div>
    <script>
      (function ( d, s, id ) {
        var js, cpJs = d.getElementsByTagName( s )[0], t = new Date();
        if ( d.getElementById( id ) ) return;
        js = d.createElement( s );
        js.id = id;
        js.setAttribute( 'data-cp-url', 'https://store.canvaspop.com' );
        js.src = 'https://store.canvaspop.com/static/js/cpopstore.js?bust=' + t.getTime();
        cpJs.parentNode.insertBefore( js, cpJs );
      }( document, 'script', 'canvaspop-jssdk' ));
    </script>
    <meta charset="UTF-8"/>
    <title>Pastyle</title>
    <script src="view.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="pablo.css">
    <link rel="icon" href="logo.png">
    <meta property="og:image"  content="pablo.jpg" />
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
          Remove Watermark
        </span>
        <br><br><br>
        <span class="button" id="printBtn" data-cp-url="pablo.jpg">
          Print Image
        </span>
        <br><br><br>
        <span class="button" onclick="deleteImage()">
          Delete Image
        </span>
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
            <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
        <br><br><br>
         <!-- Your share button code -->
         <div class="fb-share-button" data-layout="button_count" data-size="large" data-mobile-iframe="false"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
    </div>
    <br><br><br>
    <div style="width: 100%; border: 2px solid black; overflow: auto">
      <?php
        $sql = "SELECT photos.preview_path, photos.Photo_id, photos.file_path, orders.order_id, photos.Upload_Date "
        ."FROM Photos LEFT JOIN Orders ON photos.photo_id = orders.photo_id WHERE photos.email='".$_SESSION['login_user']."' ORDER BY Upload_Date DESC;";
        $result = pg_query($conn, $sql);
        if($row = pg_fetch_row($result)){
          $src = is_null($row[3]) ? $row[0] : $row[2];
          $id = $row[1];
          if(stripos($src, "..") === 0) $src = "image.php?img=" . $src;
          echo "<script> updateImage('$src', $id) </script>";
	        echo "<div class=\"imgContainer\"><img src=\"$src\" class=\"containedImg\" onclick=\"updateImage('$src', $id)\"></div>";
        }
        while($row = pg_fetch_row($result)){
          $src = is_null($row[3]) ? $row[0] : $row[2];
          $id = $row[1];
          if(stripos($src, "..") === 0) $src = "image.php?img=" . $src;
          echo "<div class=\"imgContainer\"><img src=\"$src\" class=\"containedImg\" onclick=\"updateImage('$src', $id)\"></div>"; 
        }
      ?>
    </div>
  </body>
</html>
