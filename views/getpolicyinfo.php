<?php
require_once('../mysqli_connect.php');

$query = "SELECT a.ac_ID, a.name, p.other_policies, p.checkin_date, p.checkout_date, p.cancellation_period FROM accomodation a, policy p, has_policy hp where p.policy_ID = hp.policy_ID and hp.ac_ID = a.ac_ID";
if ($result = mysqli_query($con, $query)){

                 echo "<table>";
                 //header
                 echo "<tr><td>AC_ID</td>";
								 echo "<td>AC Name</td>";
                 echo "<td>Policy</td>";
                 echo "<td>checkin time</td>";
                 echo "<td>checkout time</td>";
                 echo "<td>calcellation period</td></tr>";
                     //data
                    while ($row = mysqli_fetch_array($result))  {
                       echo "<td>{$row[0]}</td>";
                       echo "<td>{$row[1]}</td>";
                       echo "<td>{$row[2]}</td>";
                       echo "<td>{$row[3]}</td>";
											 echo "<td>{$row[4]}</td>";
											 echo "<td>{$row[5]}</td></tr>";
                     }

                     echo "</table>";
             }
             $row_cnt = mysqli_num_rows($result);

             printf("Result set has %d rows.\n", $row_cnt);
             mysqli_free_result($result);
             echo '<a href="addpolicy.php">Add policy</a>
             <a href="index.php">Home</a>';

 mysqli_close($con);

?>
