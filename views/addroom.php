<html>
<head>
  <title>Add room</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css"/>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <form action="roomadded.php" method="post">
    <b>Add a new room</b>
    <p>
      ac_ID:
      <input class="form-control"type="text" name="ac_ID" value=""  />
    </p>
    <p>
      room_ID:
      <input class="form-control"type="text" name="Room_ID" value=""  />
    </p>
    <p>
      cost:
      <input class="form-control" type="text" name="cost" value=""  />
    </p>
    <p>
      num_rooms:
      <input class="form-control"type="text" name="num_rooms" value=""  />
    </p>
    <p>
      bed_type:
      <input class="form-control"type="text" name="bed_type" value=""  />
    </p>
    <p>
      <input type="submit" class="btn btn-primary" name="submit" value="Send"  />
    </p>
  </form>
  <a href="getroominfo.php">All rooms</a>
  <a href="index.php">Home</a>


</body>
</html>
