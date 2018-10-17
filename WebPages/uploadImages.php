<html>
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
</html>


<?php
function contentImage($fileName){
  $target_dir = "../uploads/content/";
  return uploadImage($fileName,$target_dir);
}
function styleImage($fileName){
  $target_dir = "../uploads/style/";
  return uploadImage($fileName,$target_dir);
}
function uploadImage($fileName,$target_dir) {
  $target_file = $target_dir . basename($_FILES[$fileName]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES[$fileName]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES[$fileName]["size"] > 800000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      return false;
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES[$fileName]["name"]). " has been uploaded.";
          return $target_file;
      } else {
          echo "Sorry, there was an error uploading your file. Error #".$_FILES[$fileName]["error"];
          return false;
      }
  }
}

$content = "/var/www" . ltrim(contentImage("OriginalUpload"),"..");
echo "<br><br>";
$style = "/var/www" . ltrim(styleImage("StyleUpload"),"..");
if(($content!="/var/www")&&($style!="/var/www")){
  $old_path = getcwd();
  chdir('/home/npadrazo/adain/AdaIN-style/');
  $inputStr = 'th test.lua -gpu -1 -content ' . $content . ' -style '. $style . ' -gpu -1 -outputDir /var/www/html/output  2>&1';
  $output = exec($inputStr);
  chdir($old_path);
  echo "<br>";
  $path = ltrim($output,"Output image saved at: /var/www/html");
  echo "<img src = \"" . $path . "\">";
  echo "<br>";
  echo "<button data-cp-url=\"http://". $_SERVER['HTTP_HOST'] . "/" . $path ."\">Buy Now</button>";
}
?>
