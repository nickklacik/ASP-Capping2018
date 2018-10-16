<?php
function contentImage($fileName){
  $target_dir = "../uploads/content";
  uploadImage($fileName,$target_dir);
}
function styleImage($fileName){
  $target_dir = "../uploads/style";
  uploadImage($fileName,$target_dir);
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
  if ($_FILES[$fileName]["size"] > 500000) {
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
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES[$fileName]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file. Error #".$_FILES[$fileName]["error"];
      }
  }
}

contentImage("OriginalUpload");
echo "<br><br>";
styleImage("StyleUpload");
?>
