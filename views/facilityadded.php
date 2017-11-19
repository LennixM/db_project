<html>  
    <head>
      <title>Add facility</title>
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            $data_missing = array();

            if (empty($_POST['name'])) {
                $data_missing[] = 'name';
            } else {
                $name = trim($_POST['name']);
            }

            if (isset($_POST['wifi'])) {
                $bool = 1;
            } else {
                $bool = 0;
            }

            if (empty($_POST['otime'])) {
                $data_missing[] = 'otime';
            } else {
                $otime = trim($_POST['otime']);
            }

            if (empty($_POST['ctime'])) {
                $data_missing[] = 'ctime';
            } else {
                $ctime = trim($_POST['ctime']);
            }
            
            if(empty($_POST['ac_ID'])) {
                $data_missing[] = 'ac_ID';
            } else {
                $ac_ID = trim($_POST['ac_ID']);
            }

            if (empty($data_missing)) {
                require_once '../mysqli_connect.php';
                
                mysqli_query($con, "INSERT INTO facilities (wifi, name, opening_times, closing_times) VALUES ($bool, '$name', '$otime', '$ctime')");
               
                $affected_rows = mysqli_affected_rows($con);
                if ($affected_rows == 1) {
                    echo 'Facility Entered';
                } else {
                    echo 'Error Occurred <br />';
                    echo mysqli_error();
                }
                
                $f_ID = mysqli_insert_id($con);
                
                mysqli_query($con, "INSERT INTO has (ac_ID, f_ID) VALUES ($ac_ID, $f_ID)");

                $affected_has = mysqli_affected_rows($con);
                if ($affected_has == 1) {
                    echo '-has- relation updated';
                } else {
                    echo 'ERROR -has- relation not updated <br />';
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
    
    <a href="addfacilities.php">Go Back</a>
		<a href="index.php">Home</a>
    </body>
</html>