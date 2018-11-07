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
    <link rel="stylesheet" type="text/css" href="admin.css">  
  </head>
  <body id=bkg2>
    <?php
      require("functions.php");
      createHeader();
    ?>
    <br>
	<h1 id=h1 align=center> System Logs </h1>
	<br>
  <div class="logDiv">
    <div class = "dateDiv"><h2 style="padding-left:10px;"><?php echo date("l, m/d/y", strtotime( '-1 days'))?> </div>
    <p style="padding-left:10px;">Images Uploaded:
    <?php
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date::date = current_date");
    $uploads = pg_fetch_assoc($result);
    echo $uploads['count'];
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td>1a </td>
      <td>2a</td>
      <td>3a</td>
      <td>4a</td>
      <td>5a</td>
      <td>6a</td>
      <td>7a</td>
      <td>8a</td>
      <td>9a</td>
      <td>10a</td>
      <td>11a</td>
      <td>12p</td>
      <td>1p</td>
      <td>2p</td>
      <td>3p</td>
      <td>4p</td>
      <td>5p</td>
      <td>6p</td>
      <td>7p</td>
      <td>8p</td>
      <td>9p</td>
      <td>10p</td>
      <td>11p</td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
    </table>
  <div class="logDiv">
    <div class = "dateDiv"><h2 style="padding-left:10px;"><?php echo date("l, m/d/y", strtotime( '-1 days'))?> </div>
    <p style="padding-left:10px;">Images Uploaded:
    <?php
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date::date = current_date -1");
    $uploads = pg_fetch_assoc($result);
    echo $uploads['count'];
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td>1a </td>
      <td>2a</td>
      <td>3a</td>
      <td>4a</td>
      <td>5a</td>
      <td>6a</td>
      <td>7a</td>
      <td>8a</td>
      <td>9a</td>
      <td>10a</td>
      <td>11a</td>
      <td>12p</td>
      <td>1p</td>
      <td>2p</td>
      <td>3p</td>
      <td>4p</td>
      <td>5p</td>
      <td>6p</td>
      <td>7p</td>
      <td>8p</td>
      <td>9p</td>
      <td>10p</td>
      <td>11p</td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
    </table>
  <br>
	</div>
  <div class="logDiv">
    <div class = "dateDiv"><h2 style="padding-left:10px;"><?php echo date("l, m/d/y", strtotime( '-2 days'))?> </div>
    <p style="padding-left:10px;">Images Uploaded:
    <?php
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date::date = current_date -2");
    $uploads = pg_fetch_assoc($result);
    echo $uploads['count'];
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td>1a </td>
      <td>2a</td>
      <td>3a</td>
      <td>4a</td>
      <td>5a</td>
      <td>6a</td>
      <td>7a</td>
      <td>8a</td>
      <td>9a</td>
      <td>10a</td>
      <td>11a</td>
      <td>12p</td>
      <td>1p</td>
      <td>2p</td>
      <td>3p</td>
      <td>4p</td>
      <td>5p</td>
      <td>6p</td>
      <td>7p</td>
      <td>8p</td>
      <td>9p</td>
      <td>10p</td>
      <td>11p</td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
  </table>
  <br>
  </div>
  <div class="logDiv">
    <div class = "dateDiv"><h2 style="padding-left:10px;"><?php echo date("l, m/d/y", strtotime( '-3 days'))?> </div>
    <p style="padding-left:10px;">Images Uploaded:
    <?php
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date::date = current_date -3");
    $uploads = pg_fetch_assoc($result);
    echo $uploads['count'];
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td>1a </td>
      <td>2a</td>
      <td>3a</td>
      <td>4a</td>
      <td>5a</td>
      <td>6a</td>
      <td>7a</td>
      <td>8a</td>
      <td>9a</td>
      <td>10a</td>
      <td>11a</td>
      <td>12p</td>
      <td>1p</td>
      <td>2p</td>
      <td>3p</td>
      <td>4p</td>
      <td>5p</td>
      <td>6p</td>
      <td>7p</td>
      <td>8p</td>
      <td>9p</td>
      <td>10p</td>
      <td>11p</td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
  </table>
  <br>
  </div>
  <div class="logDiv">
    <div class = "dateDiv"><h2 style="padding-left:10px;"><?php echo date("l, m/d/y", strtotime( '-4 days'))?> </div>
    <p style="padding-left:10px;">Images Uploaded:
    <?php
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date::date = current_date -4");
    $uploads = pg_fetch_assoc($result);
    echo $uploads['count'];
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td>1a </td>
      <td>2a</td>
      <td>3a</td>
      <td>4a</td>
      <td>5a</td>
      <td>6a</td>
      <td>7a</td>
      <td>8a</td>
      <td>9a</td>
      <td>10a</td>
      <td>11a</td>
      <td>12p</td>
      <td>1p</td>
      <td>2p</td>
      <td>3p</td>
      <td>4p</td>
      <td>5p</td>
      <td>6p</td>
      <td>7p</td>
      <td>8p</td>
      <td>9p</td>
      <td>10p</td>
      <td>11p</td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
  </table>
  <br>
  </div>
  <div class="logDiv">
    <div class = "dateDiv"><h2 style="padding-left:10px;"><?php echo date("l, m/d/y", strtotime( '-5 days'))?> </div>
    <p style="padding-left:10px;">Images Uploaded:
    <?php
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date::date = current_date -5");
    $uploads = pg_fetch_assoc($result);
    echo $uploads['count'];
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td>1a </td>
      <td>2a</td>
      <td>3a</td>
      <td>4a</td>
      <td>5a</td>
      <td>6a</td>
      <td>7a</td>
      <td>8a</td>
      <td>9a</td>
      <td>10a</td>
      <td>11a</td>
      <td>12p</td>
      <td>1p</td>
      <td>2p</td>
      <td>3p</td>
      <td>4p</td>
      <td>5p</td>
      <td>6p</td>
      <td>7p</td>
      <td>8p</td>
      <td>9p</td>
      <td>10p</td>
      <td>11p</td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
  </table>
  <br>
  </div>
  <div class="logDiv">
    <div class = "dateDiv"><h2 style="padding-left:10px;"><?php echo date("l, m/d/y", strtotime( '-6 days'))?> </div>
    <p style="padding-left:10px;">Images Uploaded:
    <?php
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date::date = current_date -6");
    $uploads = pg_fetch_assoc($result);
    echo $uploads['count'];
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td>1a </td>
      <td>2a</td>
      <td>3a</td>
      <td>4a</td>
      <td>5a</td>
      <td>6a</td>
      <td>7a</td>
      <td>8a</td>
      <td>9a</td>
      <td>10a</td>
      <td>11a</td>
      <td>12p</td>
      <td>1p</td>
      <td>2p</td>
      <td>3p</td>
      <td>4p</td>
      <td>5p</td>
      <td>6p</td>
      <td>7p</td>
      <td>8p</td>
      <td>9p</td>
      <td>10p</td>
      <td>11p</td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
  </table>
  <br>
  </div>
  </body>
</html>