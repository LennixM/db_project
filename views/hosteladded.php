<html>
    <head>
      <title>Add hostel</title>
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

            if (isset($_POST['kitchen'])) {
                $kitchen = 1;
            } else {
                $kitchen = 0;
            }

            if (isset($_POST['common_room'])) {
                $common_room = 1;
            } else {
                $common_room = 0;
            }

            if (empty($data_missing)) {
                require_once '../mysqli_connect.php';

                mysqli_query($con, "INSERT INTO hostel (ac_ID, kitchen, common_room) VALUES ($ac_ID,$kitchen, $common_room)");

                $affected_rows = mysqli_affected_rows($con);
                echo $affected_rows;
                if ($affected_rows == 1) {
                    echo 'Hostel Entered';
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
