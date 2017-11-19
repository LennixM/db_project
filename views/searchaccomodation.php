<div class="container">

                <div class="row">

                                <div class="col-md-12">

            <div class="input-group" id="boot-search-box">

                <input type="text" class="form-control" placeholder="Type a search term like: mobile phone" />

                <div class="input-group-btn">

                    <div class="btn-group" role="group">

                        <div class="dropdown dropdown-lg">

                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>

                            <div class="dropdown-menu dropdown-menu-right" role="menu">

                                <form class="form-horizontal" role="form">

                                  <div class="form-group">

                                    <label for="filter">Narrow the search:</label>

                                    <select class="form-control">

                                        <option value="catalogue" selected>Whole catalogue</option>

                                        <option value="modal">Modal</option>

                                        <option value="price">Price</option>

                                        <option value="popular">Most Popular</option>

                                    </select>

                                  </div>

                                  <div class="form-group">

                                    <label for="contain">Brand:</label>

                                    <input class="form-control" type="text" />

                                  </div>

                                  <div class="form-group">

                                    <label for="contain">Category:</label>

                                    <input class="form-control" type="text" />

                                  </div>

 

                                 <div class="form-group">

                                    <label for="password1" class="col-sm-3 control-label">Price Range:</label>

                                <div class="col-sm-3">

                                    <input type="text" class="form-control" id="max-price" placeholder="Max"> <br /><br />

                                    <input type="text" class="form-control" id="min-price" placeholder="Min">

                                </div>

                                  <br /><br /><br /><br />                        

                                  <button type="submit" class="btn btn-primary btn-block">Search :: <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

                                </form>

                            </div>

                        </div>

                        <button type="button" class="btn btn-success "><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

                    </div>

                </div>

            </div>

          </div>

        </div>

                </div>

</div>








<?php

require_once('../mysqli_connect.php');







$query = "SELECT * FROM accomodation";
if ($result = mysqli_query($con, $query)){

                echo "<table>";
                //header
                echo "<tr><td>Name</td>";
                echo "<td>ID</td>";
                echo "<td>Stars</td>";
                echo "<td>Description</td></tr>";
                    //data
                     while ($row = mysqli_fetch_array($result))  {
                      echo "<tr><td>{$row[0]}</td>";
                      echo "<td>{$row[1]}</td>";
                      echo "<td>{$row[2]}</td>";
                      echo "<td>{$row[3]}</td>";

                    }

                    echo "</table>";
            }
            $row_cnt = mysqli_num_rows($result);

            printf("Result set has %d rows.\n", $row_cnt);
            mysqli_free_result($result);
            echo '<a href="addaccomodation.php">Add Hotel</a>
            <a href="index.php">Home</a>';

mysqli_close($mysqli);

?>
