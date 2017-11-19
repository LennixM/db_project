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
				
			mysqli_query($con, "INSERT INTO rooms (cost, num_rooms, bed_type) VALUES ($cost, $num_rooms, '$bed_type')");

      $affected_rows = mysqli_affected_rows($con);
      if($affected_rows == 1) {
        echo 'Room Entered';
      } else {
        echo 'Error Occurred <br />';
        echo mysqli_error($con);
      }
				
			$room_ID = mysqli_insert_id($con);
				
			mysqli_query($con, "INSERT INTO contains (ac_ID, room_ID) VALUES ($ac_ID, $room_ID)");
				
			$affected_contains = mysqli_affected_rows($con);
			if ($affected_contains == 1) {
				echo '-contains- relation updated';
			} else {
				echo 'ERROR -contains- relation not updated <br />';
				echo mysqli_error();
			}
		mysqli_close($con);
    } else {
      echo 'you need to enter the following data <br />';
      foreach ($data_missing as $missing) {
        echo "$missing<br />";
      }
    }
  }
?>

   <a href="addroom.php">Go Back</a>
   <a href="index.php">Home</a>
</body>
</html>
