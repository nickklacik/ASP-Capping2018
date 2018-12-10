<?php
require('session.php');
if(empty($_SESSION['login_user'])) {
  header('Location: login.php');
}

?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Pastyle</title>
    <script src="index.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="pablo.css">
		<link rel="icon" href="logo.png">
  </head>
  <body id=bkg2>
    <?php
      require("functions.php");
      createHeader();
    ?>
	<h1 id=h1 align="center"> About Pastyle </h1>
	<p  align="center" style="padding-left:50px;padding-right:50px;font-family:Tahoma;font-size:20px;"> Pastyle is an application created by a team of students from the Marist College Class of 2019. This application serves as their senior capping project for the great Pablo Rivas. The students came up with the name Pastyle by comining the words "pastel" and "style". Pastyle is a service that will allow users to upload their own content and styles and then stylize their content using machine learning. The machine learning API used is a Fast Style Transfer in Tensorflow created by Logan Engstrom. Link: <a href="https://github.com/lengstrom/fast-style-transfer" target="_blank"> Fast Style Transfer </a> </p>
	<h2 id=h1> Meet the Team </h2>
	<br>
	<div class="about_row" align="center">
			<div class="about_column">
				<img src="kevin.jpg" style="width:80%;height:auto;">
			</div>
			<div class="about_column">	
				<img src="nicole.png" style="width:80%;height:auto;">
			</div>
			<div class="about_column">	
				<img src="nick.jpg" style="width:80%;height:auto;">
			</div>
			<div class="about_column">	
				<img src="brandon.jpg" style="width:80%;height:auto;">
			</div>
			<div class="about_column">	
				<img src="ian.jpg" style="width:80%;height:auto;">
			</div>
			<div class="about_column">
				<img src="pablo.jpg" style="width:80%;height:auto;">
			</div>
	</div>
	<br>
	<p align="center" style="padding-left:50px;padding-right:50px;font-family:Tahoma;font-size:20px;"> From left to right: Kevin Kleinschmidt (Project Manager), Nicole Padrazo (IT System Administrator), Nick Klacik (Software Developer), Brandon Litwin (Software Developer), Ian Sniffen (Software Developer), Prof. Pablo Rivas (Faculty Advisor).</p>
	</body>
</html>
