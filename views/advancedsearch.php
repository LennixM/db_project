<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>BDA Travel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css"/>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" /> -->
  <link rel="stylesheet" type="text/css" href="../css/updatetime.css"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


  <link rel="shortcut icon" type="image/png" href="../images/BDA%20Logo.png"/>




</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

  <form>
    <p>What are you looking for:</p>
    <div>
      <input type="radio" id="mainSearch1"
       name="mainSearch" value="searchAccomodation">
      <label for="mainSearch1">Accomodation</label>

      <input type="radio" id="mainSearch2"
       name="mainSearch" value="searchRoom">
      <label for="mainSearch2">Room</label>

      <input type="radio" id="mainSearch3"
       name="mainSearch" value="searchClient">
      <label for="mainSearch3">Client</label>
    </div>
    <div>
      <button type="submit">Submit</button>
    </div>
  </form>

</body>
</html>
