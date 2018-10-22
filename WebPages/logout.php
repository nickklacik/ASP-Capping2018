<?php
session_start();
unset($_SESSION['login_user']);
header('Location: login.php');
?>
