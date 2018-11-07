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
require('session.php');
  if(empty($_SESSION['login_user'])) {
    header('Location: login.php');
  }

function getNewPhotoID() {
  global $conn;
  $sql = "SELECT MAX(Photo_ID) FROM Photos;";
  $result = pg_query($conn, $sql);
  $row = pg_fetch_row($result);
  return intval($row[0]) + 1;
}

function insertPhotoIntoDB($target_file, $fileName) {
  global $conn;
  echo "<br>inserting into database<br>";
  if($target_file) {
    //$id = getNewPhotoID();
    
    $sql = "INSERT INTO Photos (file_name, file_path, email, upload_date, file_size, style_id) " 
    . "VALUES ('".basename($_FILES[$fileName]["name"])."', '$target_file', '".$_SESSION['login_user']
    ."', current_timestamp, ".$_FILES[$fileName]["size"].", 4);"; //style_id needs to be revisteed
    echo $sql ."<br>";
    $result = pg_query($conn, $sql);
    /*
    $insert['file_name'] = basename($_FILES[$fileName]["name"]);
    $insert['file_path'] = $target_file;
    $insert['email'] = $_SESSION['login_user'];
    $insert['upload_date'] = microtime();
    $insert['file_size'] = $_FILES[$fileName]["size"];
    $insert['style_id'] = 4; //test value
    $result = pg_insert($conn, "Photos", $insert, PGSQL_DML_STRING);
    */
    $status = pg_connection_status($conn);
    var_dump($result);
    
    if ($status === PGSQL_CONNECTION_OK) {
      echo 'Connection status ok';
    } else {
      echo 'Connection status bad';
    }
    
    if($result) {
      echo "successfully insert into database";
    } else {
      echo "failed to insert into database<br>";
      echo pg_last_error($conn);
    }
  } else {
    echo "Image not added to database";
  }
}

function contentImage($fileName){
  $target_dir = "../uploads/content/";
  $target_file =  uploadImage($fileName,$target_dir);
  insertPhotoIntoDB($target_file, $fileName);
  return $target_file;
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
$style = "style/" . StyleUpload;

if(($content!="/var/www")&&($style!="/var/www")){
  $old_path = getcwd();
  chdir('/home/npadrazo/fast-style-transfer/');
  $inputStr = 'python evaluate.py --checkpoint '. $style . '--in-path ' . $content . '--out-path /var/www/html/output';
  exec($inputStr);
  chdir($old_path);
  echo "<br>";
  $path = "/var/www/html/output/".$style;
  //$imageData  = base64_encode(file_get_contents($path));
  //$src = 'data: '.mime_content_type($path).';base64,'.$imageData;
  echo "<img src = \"" . $path . "\">";
  echo "<br>";
  echo "<button data-cp-url=\"http://". $_SERVER['HTTP_HOST'] . "/" . $path ."\">Buy Now</button>";
}

?>
