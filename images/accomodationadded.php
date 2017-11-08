<html>
<head>
  <title>Add accomodation</title>
</head>
<body>
  <?php

  $infile = fopen("ID_counter.txt", "r");
  $ID_counter = fgets($infile);
  fclose($infile);

  function increment(){
    $GLOBALS['ID_counter'] += 1;
    $outfile = fopen("ID_counter.txt", "w");
    fwrite($outfile, $GLOBALS['ID_counter']);
    fclose($outfile);
  }



  if(isset($_POST['submit'])) {
    $data_missing = array();

    increment();

    if(empty($_POST['name'])) {
      $data_missing[] = 'name';
    } else {
      $name = trim($_POST['name']);
    }

    echo $ID_counter;
    $ac_ID = trim($ID_counter);

    if(empty($_POST['stars'])) {
      $data_missing[] = 'stars';
    } else {
      $stars = trim($_POST['stars']);
    }

    if(empty($_POST['description'])) {
      $data_missing[] = 'description';
    } else {
      $description = trim($_POST['description']);
    }

    if(empty($data_missing)) {

      require_once('../mysqli_connect.php');
      $query = "INSERT INTO accomodation (name, ac_ID, stars, description) VALUES (?, ?, ?, ?)";

      $stmt = mysqli_prepare($con, $query);
      mysqli_stmt_bind_param($stmt, "siis", $name, $ac_ID, $stars, $description);
      mysqli_stmt_execute($stmt);

      $affected_rows = mysqli_stmt_affected_rows($stmt);
      if($affected_rows == 1) {
        echo 'Value Entered';
        mysqli_stmt_close($stmt);
        mysqli_close($con);
      } else {
        echo 'Error Occurred <br />';
        echo mysqli_error();
        mysqli_stmt_close($stmt);
        mysqli_close($con);
      }
    } else {
      echo 'you need to enter the following data <br />';

      foreach ($data_missing as $missing) {
        echo "$missing<br />";
      }
    }

  }
   ?>

   <form action="accomodationadded.php" method="post">
     <b>Add a new accomodation</b>
     <p>
       Name:
       <input type="text" name="name" value=""  />
     </p>
     <p>
       stars:
       <input type="text" name="stars" value=""  />
     </p>
     <p>
       Description:
       <input type="text" name="description" value=""  />
     </p>
     <p>
       <input type="submit" name="submit" value="Send"  />
     </p>
   </form>
</body>
</html>
