<html>
    <head>
      <title>Add motel</title>
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            $data_missing = array();

            if(empty($_POST['ac_ID'])) {
                $data_missing[] = 'ac_ID';
            } else {
                $ac_ID = trim($_POST['ac_ID']);
            }

            if(empty($_POST['num_parking'])) {
                $data_missing[] = 'num_parking';
            } else {
                $num_parking = trim($_POST['num_parking']);
            }

            if (empty($data_missing)) {
                require_once '../mysqli_connect.php';

                mysqli_query($con, "INSERT INTO motel (ac_ID, num_parking) VALUES ($ac_ID, $num_parking)");

                $affected_rows = mysqli_affected_rows($con);
                echo $affected_rows;
                if ($affected_rows == 1) {
                    echo 'Motel Entered';
                } else {
                    echo 'Error Occurred <br />';
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
    </body>
</html>
