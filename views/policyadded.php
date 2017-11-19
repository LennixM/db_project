<html>
<head>
  <title>Add room</title>
</head>
<body>
  <?php
  if(isset($_POST['submit'])) {
    $data_missing = array();

    if(empty($_POST['ops'])) {
      $data_missing[] = 'ops';
    } else {
      $ops = trim($_POST['ops']);
    }
    if(empty($_POST['cin'])) {
      $data_missing[] = 'cin';
    } else {
      $cin = trim($_POST['cin']);
    }
    if(empty($_POST['cout'])) {
      $data_missing[] = 'cout';
    } else {
      $cout = trim($_POST['cout']);
    }
    if(empty($_POST['cper'])) {
      $data_missing[] = 'cper';
    } else {
      $cper = trim($_POST['cper']);
    }
		if(empty($_POST['ac_ID'])) {
      $data_missing[] = 'ac_ID';
    } else {
      $ac_ID = trim($_POST['ac_ID']);
    }

    if(empty($data_missing)) {

      require_once('../mysqli_connect.php');
				
			mysqli_query($con, "INSERT INTO policy (other_policies, checkin_date, checkout_date, cancellation_period) VALUES ('$ops', '$cin', '$cout', '$cper')");

      $affected_rows = mysqli_affected_rows($con);
      if($affected_rows == 1) {
        echo 'Room Entered';
      } else {
        echo 'Error Occurred <br />';
        echo mysqli_error($con);
      }
				
			$p_ID = mysqli_insert_id($con);
				
			mysqli_query($con, "INSERT INTO has_policy (ac_ID, policy_ID) VALUES ($ac_ID, $p_ID)");
				
			$affected_pol = mysqli_affected_rows($con);
			if ($affected_pol == 1) {
				echo '-has_policy- relation updated';
			} else {
				echo 'ERROR -has_policy- relation not updated <br />';
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

   <a href="addpolicy.php">Go Back</a>
   <a href="index.php">Home</a>
</body>
</html>
