<?php
  // Returns absolute file path for a given file path
  function getAbsFilePath($path) {
    if(strpos($path, '..') !== false) {
      return "/var/www/" . substr($path, 3);
    } else {
      return "/var/www/html/" . $path;
    }
  }

  if(!empty($_GET['photo_id'])) {
    require_once('session.php');
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    $photo_id = $GET['photo_id'];
    $sql = "SELECT file_path, preview_path FROM Photos WHERE photo_id = $photo_id";
    $result = pg_query($conn, $sql); // get relative file paths from database
    $record = pg_fetch_row($result);
    $file_path = record[0];
    $abs_file_path = getAbsFilePath($file_path);
    unlink($abs_file_path); // Delete File
    $watermark_path = record[1];
    $abs_wm_path = getAbsFilePath($watermark_path);
    unlink($abs_wm_path); // Delete watermark
    $sql = "DELETE FROM Orders WHERE photo_id = $photo_id;";
    $result = pg_query($conn, $sql); //Remove orders related to photo from database
    $sql = "DELETE FROM Photos WHERE photo_id = $photo_id;";
    $result = pg_query($conn, $sql); //Remove photo from database
  }
  
  header('Location: view.php');
?>