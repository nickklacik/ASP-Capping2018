<?php
require('session.php');
function createHeader() {
  echo "<div style=\"height: 150px; width: 100%;\">"
    .  "<div style=\"text-align: center; height: 100px; background-color: white;\">"
    .    "<img src=\"pastyle.png\" style=\"height: 100%\">"
    .  "</div>"
    .  "<div style=\"text-align: center; line-height: 50px; height: 50px; background-color: black;"
    .    "border: 2px solid black;\">"
    .  "<span class=\"headerLink\" onclick=\"window.location.href = 'index.php'\">Home</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'about.php'\">About</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'view.php'\">View</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'upload.php'\">Upload</span>";
  if(isset($_SESSION['login_user'])) {
    echo  "<span class=\"headerLink\" onclick=\"window.location.href = 'logout.php'\">Logout</span>";
  } 
  echo "</div>";
}
?>
