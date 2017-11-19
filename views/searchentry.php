<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 300px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: Gainsboro;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 6px 6px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: Black;
}

.main {
    margin-left: 300px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>


<div class="sidenav">
  <a href="#">

  <h>Accomodation type: </h>

  <form action="/action_page.php" id="accomodation">
  <input class="checkinput" type="checkbox" name="accomodation[]" value="hotel">Hotel<br>
  <input class="checkinput" type="checkbox" name="accomodation[]" value="hostel">Hostel<br>
  <input class="checkinput" type="checkbox" name="accomodation[]" value="motel">Motel<br>
  <input class="checkinput" type="checkbox" name="accomodation[]" value="resort">Resort<br>
  </form>

  </a>

  <a href="#">

  <h>Room type: </h>

  <form action="/action_page.php" id="rooms">
  <input class="checkinputrooms" type="checkbox" name="rooms[]" value="single">Single<br>
  <input class="checkinputrooms" type="checkbox" name="rooms[]" value="double">Double<br>
  <input class="checkinputrooms" type="checkbox" name="rooms[]" value="studio">Studio<br>
  <input class="checkinputrooms" type="checkbox" name="rooms[]" value="dormitory">Dormitory<br>
  <input class="checkinputrooms" type="checkbox" name="rooms[]" value="suites">Suites<br>
  </form>

  </a>

  <a href="#"><form action="/action_page.php">
  <input type="checkbox" value="Yes"> Do you want the stars to be 	more than the average of the city?<br>
 	</form> </a>

  <a href="#"><div id="slidecontainer">
  <p>Price range:</p>
  <input type="range" min="0" max="500" value="0" class="slider" id="myRange">
	<p>Price: <span id="demo"></span> &euro;</p>

    <script>
var slide = document.getElementById("myRange");
var out = document.getElementById("demo");
out.innerHTML = slide.value;

slide.oninput = function() {
  out.innerHTML = this.value;
}
</script>

	</div>

    </a>




  <a href="#"><p>
	<form action="/action_page.php">
  <input type="checkbox" value="Yes"> Free Wifi?<br>
 	</form>
	</p></a>

    <a href="#">
    <label for="meeting">Check-in date: </label><input id="meeting" type="date" value="2011-01-13"/>
      </a>

      <a href="#">
    <label for="meeting">Check-out Date : </label><input id="meeting" type="date" value="2011-01-13"/>
      </a>

       <a href="#"><div id="slidecontainer">
  <p>Stars:</p>
  <input type="range" min="1" max="5" value="1" class="slider" id="my">
	<p>: <span id="de"></span></p>



	</div>



    </a>

</div>
<div style="float: right"id="result"></div>
</div>
<div style="float: right"id="resultrooms"></div>
</div>

<script>
/*
var slider = document.getElementById("my");
var output = document.getElementById("de");
output.innerHTML = slider.value;

slider.oninput = function() {
output.innerHTML = this.value;
}
*/
$(document).ready(function(){



var changeTimer = false;

$("body").css("background-color", "yellow");

$(".checkinput").change(function(){

        if(changeTimer !== false) clearTimeout(changeTimer);
        changeTimer = setTimeout(function(){
          $.ajax({
           url:"fetchaccomodation.php",
           method:"POST",
           data:$("#accomodation").serialize(),
           success:function(data)
           {
            $('#result').html(data);
           }
          });
            changeTimer = false;
        },300);
});

$(".checkinputrooms").change(function(){
        if(changeTimer !== false) clearTimeout(changeTimer);
        changeTimer = setTimeout(function(){
          $.ajax({
           url:"fetchroom.php",
           method:"POST",
           data:$("#rooms").serialize(),
           success:function(data)
           {
            $('#resultrooms').html(data);
           }
          });
            changeTimer = false;
        },300);
});


});
</script>

</body>
</html>
