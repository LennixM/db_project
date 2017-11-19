<?php

require_once('../mysqli_connect.php');

$query = "SELECT a.name, a.ac_ID, a.stars, a.description, m.num_parking FROM accomodation a, motel m where a.ac_ID = m.ac_ID";
if ($result = mysqli_query($con, $query)){

                echo "<table>";
                //header
                echo "<tr><td>Name</td>";
                echo "<td>ac_ID</td>";
                echo "<td>Stars</td>";
                echo "<td>Description</td>";
                echo "<td>Number of Parking</td></tr>";
                    //data
                     while ($row = mysqli_fetch_array($result))  {
                      echo "<tr><td>{$row[0]}</td>";
                      echo "<td>{$row[1]}</td>";
                      echo "<td>{$row[2]}</td>";
                      echo "<td>{$row[3]}</td>";
                      echo "<td>{$row[4]}</td>";
                      echo "<td>{$row[5]}</td>";
                    }
                    echo "</table>";
            }

            $row_cnt = mysqli_num_rows($result);

            printf("Result set has %d rows.\n", $row_cnt);
            mysqli_free_result($result);
            echo '<a href="addmotel.php">Add Motel</a>
            <a href="index.php">Home</a>';

mysqli_close($mysqli);

?>
