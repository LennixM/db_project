<?php
//fetch.php
require_once('../mysqli_connect.php');
$output = '';
if(isset($_POST["query"]))
{
  if ($_POST["hotel"] == "Yes") {
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "
     SELECT * FROM accomodation a, hotel h
     WHERE a.ac_ID = h.ac_ID
    ";
  }else {
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "
     SELECT * FROM accomodation;
    ";
  }
}
else
{
 $query = "
  SELECT * FROM accomodation ORDER BY stars
 ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Name</th>
     <th>Stars</th>
     <th>Description</th>
    </tr>
 ';
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
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
