<html>
    <head>
      <title>Add hotel</title>
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

            if (isset($_POST['room_service'])) {
                $room_service = 1;
            } else {
                $room_service = 0;
            }

            if (isset($_POST['parking'])) {
                $parking = 1;
            } else {
                $parking = 0;
            }

            if (empty($data_missing)) {
                require_once '../mysqli_connect.php';

                mysqli_query($con, "INSERT INTO hotel (ac_ID, room_service, parking) VALUES ($ac_ID,$room_service, $parking)");

                $affected_rows = mysqli_affected_rows($con);
                echo $affected_rows;
                if ($affected_rows == 1) {
                    echo 'Hotel Entered';
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
