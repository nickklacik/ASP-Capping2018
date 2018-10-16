<?php
function createHeader() {
  echo "<div style=\"height: 150px; width: 100%;\">"
    .  "<div style=\"text-align: center; height: 100px; background-color: white;\">"
    .    "<img src=\"pastyle.png\" width=\"100px\" height=\"100px\">"
    .  "</div>"
    .  "<div style=\"text-align: center; line-height: 50px; height: 50px; background-color: orange;"
    .    "border: 2px solid black;\">"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'index.php'\">Home</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'about.html\">About</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'view.php'\">View</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'upload.html\">Upload</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'login.php'\">Login</span>"
    .    "<span class=\"headerLink\" onclick=\"window.location.href = 'register.php'\">Register</span>"
    .  "</div>";
}
?>