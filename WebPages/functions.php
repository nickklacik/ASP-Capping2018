<?php
require('session.php');
function createHeader() {
  echo "<div style=\"height: 150px; width: 98.5%; \">"
    .  "<div style=\"text-align: center; height: 115px; background-color: black; border-right: 2px solid white; border-top: 2px solid white; border-left: 2px solid white; border-bottom: 1px solid white;\">"
    .    "<img src=\"logo_transparent.png\" style=\"height: 100%\">"
    .  "</div>"
    .  "<div style=\"text-align: center; line-height: 50px; height: 50px; background-color: black; border-right: 2px solid white; border-top: 1px solid white; border-left: 2px solid white; border-bottom: 2px solid white; padding-top: 3px; padding-bottom: 3px; \">"
    .  "<span class=\"headerLink\" onclick=\"window.location.href = 'index.php'\">Home</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'about.php'\">About</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'view.php'\">View</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'upload.php'\">Upload</span>";
  if(isset($_SESSION['is_admin'])) {
    echo  "<span class=\"headerLink\" onclick=\"window.location.href = 'admin.php'\">Admin</span>";
  } 
  if(isset($_SESSION['login_user'])) {
    echo  "<span class=\"headerLink\" onclick=\"window.location.href = 'logout.php'\">Logout</span>";
  } 
  echo "</div>";
}
?>
