<html>
    <head>
      <title>Add spa</title>
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            $data_missing = array();

            if(empty($_POST['f_ID'])) {
                $data_missing[] = 'f_ID';
            } else {
                $f_ID = trim($_POST['f_ID']);
            }

            if (isset($_POST['massage'])) {
                $massage = 1;
            } else {
                $massage = 0;
            }

            if (isset($_POST['sauna'])) {
                $sauna = 1;
            } else {
                $sauna = 0;
            }

            if (isset($_POST['thermal_baths'])) {
                $thermal_baths = 1;
            } else {
                $thermal_baths = 0;
            }

            if (empty($data_missing)) {
                require_once '../mysqli_connect.php';

                mysqli_query($con, "INSERT INTO spa (f_ID, massage, sauna, thermal_baths) VALUES ($f_ID, $massage, $sauna, $thermal_baths)");

                $affected_rows = mysqli_affected_rows($con);
                echo $affected_rows;
                if ($affected_rows == 1) {
                    echo 'Spa Entered';
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
