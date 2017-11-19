<html>  
    <head>
      <title>Add facility</title>
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            $data_missing = array();

            if (empty($_POST['zipcode'])) {
                $data_missing[] = 'zipcode';
            } else {
                $zipcode = trim($_POST['zipcode']);
            }

						if (empty($_POST['street'])) {
                $data_missing[] = 'street';
            } else {
                $street = trim($_POST['street']);
            }

            if (empty($_POST['city'])) {
                $data_missing[] = 'city';
            } else {
                $city = trim($_POST['city']);
            }

            if (empty($_POST['state'])) {
                $data_missing[] = 'state';
            } else {
                $state = trim($_POST['state']);
            }
					
					  if (empty($_POST['country'])) {
                $data_missing[] = 'country';
            } else {
                $country = trim($_POST['country']);
            }
            
            if(empty($_POST['ac_ID'])) {
                $data_missing[] = 'ac_ID';
            } else {
                $ac_ID = trim($_POST['ac_ID']);
            }

            if (empty($data_missing)) {
                require_once '../mysqli_connect.php';
                
                mysqli_query($con, "INSERT INTO location (zip_code, street, city, state, country) VALUES ($zipcode, '$street', '$city', '$state', '$country')");
               
                $affected_rows = mysqli_affected_rows($con);
                if ($affected_rows == 1) {
                    echo 'Location Entered';
                } else {
                    echo 'Error Occurred <br />';
                    echo mysqli_error($con);
                }
                
                $l_ID = mysqli_insert_id($con);
                
                mysqli_query($con, "INSERT INTO is_at (ac_ID, l_ID) VALUES ($ac_ID, $l_ID)");

                $affected_loc = mysqli_affected_rows($con);
                if ($affected_loc == 1) {
                    echo '-has- relation updated';
                } else {
                    echo 'ERROR -has- relation not updated <br />';
                    echo mysqli_error($con);
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
    
    <a href="addlocation.php">Go Back</a>
		<a href="index.php">Home</a>
    </body>
</html>