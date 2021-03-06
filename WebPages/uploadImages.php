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
  //echo "<br>inserting into database<br>";
  if($target_file) {

    $id = getNewPhotoID();
    $newFileName = explode("output/",$target_file);
    
    $fileSize = filesize($target_file);
    
    $sql = "INSERT INTO Photos (file_name, file_path, email, upload_date, file_size) " 
    . "VALUES ('".$newFileName[1]."', '$target_file', '".$_SESSION['login_user']
    ."', current_timestamp, $fileSize)"; 
   
    $result = pg_query($conn, $sql);
    $status = pg_connection_status($conn);
    
    if ($status === PGSQL_CONNECTION_OK) {
      //echo 'Connection status ok';
    } else {
      echo 'Connection status bad';
    }
    
    if($result) {
      //echo "successfully insert into database";
    } else {
        echo "failed to insert into database<br>";
        echo pg_last_error($conn);
    }
  } else {
      echo "Image not added to database";
  }
}
function watermarkImage($srcFilePath) {
  global $conn;
  // Load the stamp and the photo to apply the watermark to
 
  $destImage = imagecreatefromjpeg($srcFilePath);

  $watermark = imagecreatefrompng('logo_transparent.png');
  $watermark_width = imagesx($watermark);
  $watermark_height = imagesy($watermark);

  // Resizing the watermark based on size of uploaded image
  $percent = 0.3;
  $newwidth = imagesx($destImage) * $percent;
  $newheight = $newwidth * $watermark_height / $watermark_width;

  // create a new image with the new dimension.
  $new_watermark = imagecreatetruecolor($newwidth, $newheight);

  // Retain image transparency for your watermark, if any.
  imagealphablending($new_watermark, false);
  imagesavealpha($new_watermark, true);

  // copy $watermark, and resized, into $new_watermark
  imagecopyresampled($new_watermark, $watermark, 0, 0, 0, 0, $newwidth, $newheight, $watermark_width, $watermark_height);

  $_Dimx = imagesx($destImage);
  $_Dimy = imagesy($destImage);
  $logo_Dimx = imagesx($new_watermark);
  $logo_Dimy = imagesy($new_watermark);
  $x = $_Dimx - $logo_Dimx;
  $y = $_Dimy - $logo_Dimy;
  imagecopy($destImage, $new_watermark, $x, $y, 0, 0, $newwidth, $newheight);
  imagedestroy($new_watermark); 

  // Output and free memory
  //header('Content-type: image/png');
  //imagepng($destImage, '../uploads/content/watermarkedimage.png');
  $sql = "SELECT photo_id FROM Photos ORDER BY photo_id DESC LIMIT 1";
  $result = pg_query($conn, $sql);
  if ($result) {
    $row = pg_fetch_array($result);
    $preview_path = "../uploads/content/watermarked_" . $row[0] . ".png";
    imagepng($destImage, $preview_path);
    $sql = "UPDATE photos SET preview_path = '".$preview_path."' WHERE photo_id = " . $row[0];
    //echo $sql;
    $result = pg_query($conn, $sql);
    if ($result) {
      //echo "photo table updated";
    } else {
        echo pg_last_error($conn);
    }
  } else {
      echo pg_last_error($conn);
  }
  
}
function contentImage($fileName){
  $target_dir = "../uploads/content/";
  $target_file =  uploadImage($fileName,$target_dir);
  return $target_file;
}
function styleImage($fileName){
  $target_dir = "../uploads/style/";
  return uploadImage($fileName,$target_dir);
}
function uploadImage($fileName,$target_dir) {
  $id = getNewPhotoID();
  $target_file = $target_dir . preg_replace('/\s+/', '_', basename($file_name, "$imageFileType")) . "_" . $id . $imageFileType;
  $target_file = $target_dir . basename($_FILES[$fileName]["name"]);
  $uploadOk = 1;
  
  $imageFileType = "." . strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  $file_name = basename($_FILES[$fileName]["name"]);
  if (strlen($file_name) > 30) {
  	$file_name = substr($file_name, 0, 15);
  }
  $target_file = $target_dir . str_replace(' ', '_', basename($file_name, "$imageFileType")) . "_" . $id . $imageFileType; 
  
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
  if($imageFileType != ".jpg" && $imageFileType != ".png" && $imageFileType != ".jpeg"
  && $imageFileType != ".gif" ) {
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
echo "We are currently processing your image! <br>";
$startTime = microtime(true);
$content = "/var/www" . ltrim(contentImage("OriginalUpload"),"..");

if(isset($_POST["submit"])){
  $style = "style/" . $_POST['StyleUpload'];
  if(($content!="/var/www")&&($style!="/var/www")){
    $old_path = getcwd();
    chdir('/home/developer/fast-style-transfer/');
    $inputStr = 'sudo -u developer python evaluate.py --checkpoint '. $style . ' --in-path ' . $content . ' --out-path /var/www/html/output 2>&1';
    
    $resultErr = shell_exec($inputStr);
    
    chdir($old_path);
    
    $fileName = str_replace("/var/www/uploads/content/","",$content);
    
    $path = "output/" . $fileName;
    // Insert this styled file path into the database
    echo $path;
    echo "<br>";
    echo $fileName;
    insertPhotoIntoDB($path,$fileName);
    $imageData  = base64_encode(file_get_contents($path));
    $src = 'data: '.mime_content_type($path).';base64,'.$imageData;
    watermarkImage($src);
    $processTime = (microtime(true) - $startTime);
    
    $sql = "UPDATE photos SET processing_time = $processTime where photo_id = (SELECT photo_id from photos ORDER BY photo_id DESC LIMIT 1)";
    
    $result = pg_query($conn, $sql);
    
    echo '<script>window.location.href="view.php";</script>';
   
  }
}
?>
