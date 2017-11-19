<?php

require_once('../mysqli_connect.php');

$query = "SELECT f.name, f.f_ID, f.wifi, f.opening_times, f.closing_times, r.massage, r.sauna, r.thermal_baths FROM facilities f, spa r where f.f_ID = r.f_ID";
if ($result = mysqli_query($con, $query)){

                echo "<table>";
                //header
                echo "<tr><td>f_ID</td>";
                echo "<td>WiFi</td>";
                echo "<td>Name</td>";
                echo "<td>Op Time</td>";
                echo "<td>Cl Time</td>";
                echo "<td>Sauna</td>";
                echo "<td>Thermal Bath</td>";
                echo "<td>Massage</td></tr>";
                    //data
                     while ($row = mysqli_fetch_array($result))  {
                      echo "<tr><td>{$row[0]}</td>";
                      echo "<td>{$row[1]}</td>";
                      echo "<td>{$row[2]}</td>";
                      echo "<td>{$row[3]}</td>";
                      echo "<td>{$row[4]}</td>";
                      echo "<td>{$row[5]}</td>";
                      echo "<td>{$row[6]}</td>";
                      echo "<td>{$row[7]}</td>";
                      echo "<td>{$row[8]}</td>";
                    }
                    echo "</table>";
            }

            $row_cnt = mysqli_num_rows($result);

            printf("Result set has %d rows.\n", $row_cnt);
            mysqli_free_result($result);
            echo '<a href="addspa.php">Add spa</a>
            <a href="index.php">Home</a>';

mysqli_close($mysqli);

?>
