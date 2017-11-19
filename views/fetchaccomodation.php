<?php
//fetch.php
require_once('../mysqli_connect.php');
$output = '';

  if(!empty($_POST['accomodation'])) {
    $output .= '
     <div class="table-responsive">
      <table class="table table bordered">
       <tr>
        <th>Name</th>
        <th>Stars</th>
        <th>Description</th>
       </tr>
    ';
    foreach($_POST['accomodation'] as $check) {
            if ($check =="hotel") {
              $query = "
               SELECT * FROM accomodation a, hotel h where a.ac_ID = h.ac_ID
              ";


              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0)
              {
               while($row = mysqli_fetch_array($result))
               {
                $output .= '
                 <tr>
                  <td>'.$row["name"].'</td>
                  <td>'.$row["stars"].'</td>
                  <td>'.$row["description"].'</td>

                 </tr>
                ';
               }


            }
          }
            elseif ($check =="hostel") {
              $query = "
               SELECT * FROM accomodation a, hostel hs where a.ac_ID = hs.ac_ID
              ";

              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0)
              {
               while($row = mysqli_fetch_array($result))
               {
                $output .= '
                 <tr>
                  <td>'.$row["name"].'</td>
                  <td>'.$row["stars"].'</td>
                  <td>'.$row["description"].'</td>

                 </tr>
                ';
               }

             }
            }
            elseif ($check =="motel") {
              $query = "
               SELECT * FROM accomodation a, motel m where a.ac_ID = m.ac_ID
              ";


              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0)
              {
               while($row = mysqli_fetch_array($result))
               {
                $output .= '
                 <tr>
                  <td>'.$row["name"].'</td>
                  <td>'.$row["stars"].'</td>
                  <td>'.$row["description"].'</td>

                 </tr>
                ';
               }

             }
            }
            elseif ($check =="resort") {
              $query = "
               SELECT * FROM accomodation a, resort r where a.ac_ID = r.ac_ID
              ";

              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0)
              {
               while($row = mysqli_fetch_array($result))
               {
                $output .= '
                 <tr>
                  <td>'.$row["name"].'</td>
                  <td>'.$row["stars"].'</td>
                  <td>'.$row["description"].'</td>

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
