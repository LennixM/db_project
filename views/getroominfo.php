<?php
require_once('../mysqli_connect.php');

$query = "SELECT * FROM rooms";
if ($result = mysqli_query($con, $query)){

                 echo "<table>";
                 //header
                 echo "<tr><td>AC ID</td>";
                 echo "<td>Room ID</td>";
                 echo "<td>cost</td>";
                 echo "<td>Number of Rooms</td>";
                 echo "<td>Bed Type</td></tr>";
                     //data
                    while ($row = mysqli_fetch_array($result))  {
                       $hotel = mysqli_query($con, "SELECT name FROM accomodation WHERE ac_ID={$row[0]}");
                       while ($val = mysqli_fetch_array($hotel))  {
                         echo "<tr><td>{$val[0]}</td>";
                       }
                       echo "<td>{$row[1]}</td>";
                       echo "<td>{$row[2]}</td>";
                       echo "<td>{$row[3]}</td>";
                       echo "<td>{$row[4]}</td></tr>";

                     }

                     echo "</table>";
             }
             $row_cnt = mysqli_num_rows($result);

             printf("Result set has %d rows.\n", $row_cnt);
             mysqli_free_result($result);
             echo '<a href="addroom.php">Add room</a>
             <a href="index.php">Home</a>';

 mysqli_close($con);

?>
