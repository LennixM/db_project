<html>
<head>
  <title>Add facilities</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css"/>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <form action="spaadded.php" method="post">
    <b>make a facility a spa</b>
    <select name="f_ID">
      <?php
          require_once('../mysqli_connect.php');
          $query = "SELECT name, f_ID FROM facilities";
          if ($result = mysqli_query($con, $query)){
             while ($row = mysqli_fetch_array($result))  {
              echo "<option value='{$row[1]}'>{$row[0]}</option>";
            }
          }
          mysqli_close($mysqli);
      ?>
    </select>
    <p>
      massage:
      <label><input type="checkbox" name="massage" value="massage"></label>
    </p>
    <p>
      sauna:
      <label><input type="checkbox" name="sauna" value="sauna"></label>
    </p>
    <p>
      thermal bath:
      <label><input type="checkbox" name="thermal_baths" value="thermal_baths"></label>
    </p>
    <p>
      <input type="submit" class="btn btn-primary" name="submit" value="Send"/>
    </p>
  </form>
  <a href="getspainfo.php">All spas</a>
  <a href="index.php">Home</a>


</body>
</html>
