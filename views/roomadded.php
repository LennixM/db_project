<html>
<head>
  <title>Add room</title>
</head>
<body>
  <?php
  if(isset($_POST['submit'])) {
    $data_missing = array();

    if(empty($_POST['ac_ID'])) {
      $data_missing[] = 'ac_ID';
    } else {
      $ac_ID = trim($_POST['ac_ID']);
    }
    if(empty($_POST['Room_ID'])) {
      $data_missing[] = 'Room_ID';
    } else {
      $Room_ID = trim($_POST['Room_ID']);
    }
    if(empty($_POST['cost'])) {
      $data_missing[] = 'cost';
    } else {
      $cost = trim($_POST['cost']);
    }
    if(empty($_POST['num_rooms'])) {
      $data_missing[] = 'num_rooms';
    } else {
      $num_rooms = trim($_POST['num_rooms']);
    }
    if(empty($_POST['bed_type'])) {
      $data_missing[] = 'bed_type';
    } else {
      $bed_type = trim($_POST['bed_type']);
    }

    if(empty($data_missing)) {

      require_once('../mysqli_connect.php');
      $query = "INSERT INTO rooms (ac_ID, Room_ID, cost, num_rooms, bed_type) VALUES (?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($con, $query);
      mysqli_stmt_bind_param($stmt, "iidis", $ac_ID, $Room_ID, $cost, $num_rooms, $bed_type);
      mysqli_stmt_execute($stmt);

      $affected_rows = mysqli_stmt_affected_rows($stmt);
      echo $affected_rows;
      if($affected_rows == 1) {
        echo 'Room Entered';
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
