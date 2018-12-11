<?php
session_start();
unset($_SESSION['login_user']);
unset($_SESSION['is_admin']);
header('Location: login.php');
?>
