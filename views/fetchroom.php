<?php
//fetch.php
require_once('../mysqli_connect.php');
$output = '';

  if(!empty($_POST['rooms'])) {
    $output .= '
     <div class="table-responsive">
      <table class="table table bordered">
       <tr>
        <th>Cost</th>
        <th>Number of Rooms</th>
        <th>Bed Type</th>
       </tr>
    ';
    foreach($_POST['rooms'] as $check) {
            if ($check =="single") {
              $query = "
               SELECT r.cost, r.num_rooms, r.bed_type FROM rooms r, single s where r.room_ID = s.room_ID
              ";


              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0)
              {
               while($row = mysqli_fetch_array($result))
               {
                $output .= '
                 <tr>
                  <td>'.$row["cost"].'</td>
                  <td>'.$row["num_rooms"].'</td>
                  <td>'.$row["bed_type"].'</td>

                 </tr>
                ';
               }


            }
          }
            elseif ($check =="double") {
              $query = "
               SELECT r.cost, r.num_rooms, r.bed_type FROM rooms r, double_r d where r.room_ID = d.room_ID
              ";


              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0)
              {
               while($row = mysqli_fetch_array($result))
               {
                $output .= '
                 <tr>
                  <td>'.$row["cost"].'</td>
                  <td>'.$row["num_rooms"].'</td>
                  <td>'.$row["bed_type"].'</td>

                 </tr>
                ';
               }


            }
          }
            elseif ($check =="studio") {
              $query = "
               SELECT r.cost, r.num_rooms, r.bed_type FROM rooms r, studio s where r.room_ID = s.room_ID
              ";


              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0)
              {
               while($row = mysqli_fetch_array($result))
               {
                $output .= '
                 <tr>
                  <td>'.$row["cost"].'</td>
                  <td>'.$row["num_rooms"].'</td>
                  <td>'.$row["bed_type"].'</td>

                 </tr>
                ';
               }


            }
          }
            elseif ($check =="dormitory") {
              $query = "
               SELECT r.cost, r.num_rooms, r.bed_type FROM rooms r, dormitory d where r.room_ID = d.room_ID
              ";


              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0)
              {
               while($row = mysqli_fetch_array($result))
               {
                $output .= '
                 <tr>
                  <td>'.$row["cost"].'</td>
                  <td>'.$row["num_rooms"].'</td>
                  <td>'.$row["bed_type"].'</td>

                 </tr>
                ';
               }


            }
          }
          elseif ($check =="suites") {
            $query = "
             SELECT r.cost, r.num_rooms, r.bed_type FROM rooms r, suites s where r.room_ID = s.room_ID
            ";


            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0)
            {
             while($row = mysqli_fetch_array($result))
             {
              $output .= '
               <tr>
                <td>'.$row["cost"].'</td>
                <td>'.$row["num_rooms"].'</td>
                <td>'.$row["bed_type"].'</td>

               </tr>
              ';
             }


          }
        }
          }

/*
  if ($_POST["hotel"] == "Yes") {
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "
     SELECT * FROM hotel h
    ";
  }else {
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "
     SELECT * FROM accomodation;
    ";
  }
  */

 echo $output;
}


?>
