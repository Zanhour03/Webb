<?php
 
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="Img/ZanhourLogo.png" width="170" height="60" alt="">
  </a>
  
  <form class="d-flex">
  <h5> Temp:</h5> <p  id="Temp"></p>°C 
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

<form class="d-flex" action="login.php">
      <button class="btn btn-outline-success" type="submit">Login/register</button>
</form>

</nav>



<script src="Api.js"></script>
</body>
</html>


<?php

// Setting a cookie

  // session_start();
   
   //if(session_destroy()) {
  //    header("Location: Login.php");
  // }
?>