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
    <div class="dateDiv"><h2 style="padding-left:10px"><?php echo date("l, m/d/y")?></h2></div>
    <p style="padding-left:10px;">Images Uploaded:
    <?php
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date='2018-10-28'");
    $uploads = pg_num_rows($result);
    echo $uploads;
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
      <td> </td>
    </tr>
    <tr>
      <td>12p</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
      <td> </td>
    </tr>
  </table>
  <br>
  </div>
  <div class="logDiv">
  <div class = "dateDiv"><h2 style="padding-left:10px;"><?php echo date("l, m/d/y", strtotime( '-1 days'))?> </div>
  <p style="padding-left:10px;">Images Uploaded:
    <?php
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date='2018-10-28'");
    $uploads = pg_num_rows($result);
    echo $uploads;
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
      <td> </td>
    </tr>
    <tr>
      <td>12p</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
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
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date='2018-10-28'");
    $uploads = pg_num_rows($result);
    echo $uploads;
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
      <td> </td>
    </tr>
    <tr>
      <td>12p</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
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
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date='2018-10-28'");
    $uploads = pg_num_rows($result);
    echo $uploads;
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
      <td> </td>
    </tr>
    <tr>
      <td>12p</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
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
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date='2018-10-28'");
    $uploads = pg_num_rows($result);
    echo $uploads;
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
      <td> </td>
    </tr>
    <tr>
      <td>12p</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
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
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date='2018-10-28'");
    $uploads = pg_num_rows($result);
    echo $uploads;
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
      <td> </td>
    </tr>
    <tr>
      <td>12p</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
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
    $result = pg_query($conn, "SELECT COUNT(upload_date) FROM PHOTOS WHERE upload_date='2018-10-28'");
    $uploads = pg_num_rows($result);
    echo $uploads;
    ?>
    <br> Images Stylized: <br> Total Processing Time (Seconds): </p> 
    <table>
    <tr>
      <td>12a</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
      <td> </td>
    </tr>
    <tr>
      <td>12p</td>
      <td> </td>
      <td>1</td>
      <td> </td>
      <td>2</td>
      <td> </td>
      <td>3</td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td> </td>
      <td>5</td>
      <td> </td>
      <td>6</td>
      <td> </td>
      <td>7</td>
      <td> </td>
    </tr>
    <tr>
      <td>8</td>
      <td> </td>
      <td>9</td>
      <td> </td>
      <td>10</td>
      <td> </td>
      <td>11</td>
      <td> </td>
    </tr>
  </table>
  <br>
  </div>
  </body>
</html>