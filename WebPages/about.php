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
  </head>
  <body id=bkg2>
    <?php
      require("functions.php");
      createHeader();
    ?>
    <br>
	<h1 id=h1 align=center> About Pastyle </h1>
	<p style="padding-right:10px;font-family: Tahoma;font-size: 13px;"> Pastyle is an application created by a team of students from the Marist College Class of 2019. This application serves as their senior capping project for the great Pablo Rivas. The students came up with the name Pastyle by comining the words "pastel" and "style". Pastyle is a service that will allow users to upload their own content and styles and then stylize their content using machine learning. The API used is an Arbitrary Style Transfer in Real-time with Adaptive Instance Normalization. </p>
	<br>
	<h2 id=h1> Meet the Team </h2>
	<div class="table" text-align="left">
		<ul style="list-style:none;display:inline;" align="left">
			<li><img src="kevin.jpg" style="float:left;width:120px;height:120px;padding-right:15px;padding-left: 175px;"></li>
			<li><img src="nicole.jpg" style="float:left;width:120px;height:120px;padding-right:15px;"></li>
			<li><img src="nick.jpg" style="float:left;width:120px;height:120px;padding-right:15px;"></li>
			<li><img src="brandon.jpg" style="float:left;width:120px;height:120px;padding-right:15px;"></li>
			<li><img src="ian.jpg" style="float:left;width:120px;height:120px;padding-right:15px;"></li>
			<li><img src="pablo.jpg" style="float:left;width:120px;height:120px;padding-right:15px;"></li>
		</ul>
	</div>
	<br><br><br><br><br>
	<p style="font-family: Tahoma; font-size:15px;"> From left to right: Kevin Kleinschmidt (Project Manager), Nicole Padrazo (IT System Administrator), Nick Klacik (Software Developer), Brandon Litwin (Software Developer), Ian Sniffen (Software Developer), Prof. Pablo Rivas (Faculty Advisor).</p>
	</body>
</html>
