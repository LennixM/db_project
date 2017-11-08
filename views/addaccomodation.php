<html>
<head>
  <title>Add accomodation</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css"/>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <form action="accomodationadded.php" method="post">
    <b>Add a new accomodation</b>
    <p>
      Name:
      <input class="form-control"type="text" name="name" value=""  />
    </p>
    <p>
      stars:
      <input class="form-control" type="text" name="stars" value=""  />
    </p>
    <p>
      Description:
      <input class="form-control"type="text" name="description" value=""  />
    </p>
    <p>
      <input type="submit" class="btn btn-primary" name="submit" value="Send"  />
    </p>
  </form>
  <a href="getaccomodationinfo.php">All hotels</a>
  <a href="index.php">Home</a>


</body>
</html>
