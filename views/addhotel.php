<html>
<head>
  <title>Add hotel</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css"/>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <form action="hoteladded.php" method="post">
    <b>Make a Accomodation a Hotel!</b>
    <select name="ac_ID">
      <?php
          require_once('../mysqli_connect.php');
          $query = "SELECT name, ac_ID FROM accomodation";
          if ($result = mysqli_query($con, $query)){
             while ($row = mysqli_fetch_array($result))  {
              echo "<option value='{$row[1]}'>{$row[0]}</option>";
            }
          }
          mysqli_close($mysqli);
      ?>
    </select>
    <p>
      room_service:
      <label><input type="checkbox" name="room_service" value="room_service">has room service?</label>
    </p>
    <p>
      parking:
      <label><input type="checkbox" name="parking" value="parking">has parking</label>
    </p>
    <p>
      <input type="submit" class="btn btn-primary" name="submit" value="Send"/>
    </p>
  </form>
  <a href="gethotelinfo.php">All hotels</a>
  <a href="index.php">Home</a>


</body>
</html>
