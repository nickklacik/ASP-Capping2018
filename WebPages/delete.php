<?php
  if(!empty($_GET['photo_id'])) {
    require_once('session.php');
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    $photo_id = $GET['photo_id'];
    $sql = "SELECT file_path FROM Photos WHERE photo_id = $photo_id";
    $result = pg_query($conn, $sql); // get relative file path from database
    $file_path = pg_fetch_row($result)[0];
    $abs_file_path = "/var/www/" . substr($file_path, 3); // Get absolute file path
    unlink($abs_file_path); // Delete File
    $sql = "DELETE FROM Orders WHERE photo_id = $photo_id;";
    $result = pg_query($conn, $sql); //Remove orders related to photo from database
    $sql = "DELETE FROM Photos WHERE photo_id = $photo_id;";
    $result = pg_query($conn, $sql); //Remove photo from database
  }
  
  header('Location: view.php');
?>