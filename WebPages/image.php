<?php
  $image = $_GET['img'];
  $ext = array_pop(explode ('.', $image));
  if($ext == 'png')
    header('Content-Type: image/png');
  else if ($ext == 'gif')
    header('Content-Type: image/gif');
  else
    header('Content-Type: image/jpeg');
  
  readfile($image);
?>