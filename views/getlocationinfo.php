<?php
require_once('../mysqli_connect.php');

$query = "SELECT a.ac_ID, l.l_ID, a.name, l.zip_code, l.street, l.city, l.state, l.country FROM location l, accomodation a, is_at c where l.l_ID = c.l_ID and c.ac_ID = a.ac_ID";
if ($result = mysqli_query($con, $query)){

                 echo "<table>";
                 //header
                 echo "<tr><td>AC_ID</td>";
								 echo "<td>L_ID</td>";
								 echo "<td>AC Name</td>";
                 echo "<td>zipcode</td>";
                 echo "<td>street</td>";
                 echo "<td>city</td>";
								 echo "<td>state</td>";
                 echo "<td>country</td></tr>";
                     //data
                    while ($row = mysqli_fetch_array($result))  {
                       echo "<td>{$row[0]}</td>";
                       echo "<td>{$row[1]}</td>";
                       echo "<td>{$row[2]}</td>";
                       echo "<td>{$row[3]}</td>";
											 echo "<td>{$row[4]}</td>";
											 echo "<td>{$row[5]}</td>";
											 echo "<td>{$row[6]}</td>";
											 echo "<td>{$row[7]}</td></tr>";
                     }

                     echo "</table>";
             }
             $row_cnt = mysqli_num_rows($result);

             printf("Result set has %d rows.\n", $row_cnt);
             mysqli_free_result($result);
             echo '<a href="addlocation.php">Add location</a>
             <a href="index.php">Home</a>';

 mysqli_close($con);

?>
