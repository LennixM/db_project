<?php

require_once('../mysqli_connect.php');

$query = "SELECT * FROM facilities";
if ($result = mysqli_query($con, $query)){

                echo "<table>";
                //header
                echo "<tr><td>f_ID</td>";
                echo "<td>WiFi</td>";
                echo "<td>Name</td>";
                echo "<td>Op Time</td>";
                echo "<td>Cl Time</td></tr>";
                    //data
                     while ($row = mysqli_fetch_array($result))  {
                      echo "<tr><td>{$row[0]}</td>";
                      echo "<td>{$row[1]}</td>";
                      echo "<td>{$row[2]}</td>";
                      echo "<td>{$row[3]}</td>";
                      echo "<td>{$row[4]}</td>";
                    }
                    echo "</table>";
            }

            $row_cnt = mysqli_num_rows($result);

            printf("Result set has %d rows.\n", $row_cnt);
            mysqli_free_result($result);
            echo '<a href="addfacilities.php">Add facility</a>
            <a href="index.php">Home</a>';

mysqli_close($mysqli);

?>
