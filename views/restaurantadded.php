<html>
    <head>
      <title>Add restaurant</title>
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            $data_missing = array();

            if (empty($_POST['cuisine'])) {
                $data_missing[] = 'cuisine';
            } else {
                $cuisine = trim($_POST['cuisine']);
            }

            if(empty($_POST['f_ID'])) {
                $data_missing[] = 'f_ID';
            } else {
                $f_ID = trim($_POST['f_ID']);
            }

            if (empty($data_missing)) {
                require_once '../mysqli_connect.php';

                mysqli_query($con, "INSERT INTO restaurant (f_ID, cuisine) VALUES ($f_ID,'$cuisine')");

                $affected_rows = mysqli_affected_rows($con);
                echo $affected_rows;
                if ($affected_rows == 1) {
                    echo 'Restaurant Entered';
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
