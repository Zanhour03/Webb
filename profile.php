<?php
//Runs the code in session.php
   include('session.php');


  
?>


 <!DOCTYPE html>



  

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Custom.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <style>
     
   </style>
</head>

<?php
//cookies for dark mode
   if($_COOKIE["theme"] == "dark" ){
     $bg = "#1b1d1e";
     $color = "#fff";
   } else {
     
    $bg = "#f1f1f1";
    $color = "#1b1d1e";
   }
   error_reporting(E_ERROR | E_PARSE);   
?>

<body style ="background-color: <?php echo $bg;?>; color:<?php echo $color;?>">




<!--Start of navbar-->
<nav class="navbar navbar-light bg-light">
  <label class="switch">
   Dark mode <input type="checkbox" id="toggleTheme" <?php  if($_COOKIE["theme"] == "dark" ){echo "checked";}?>>
  </label>
<!--Image link that will redirect to homepage (home.png)-->
  <a class="navbar-brand" href="home.php"><img src="Img/ZanhourLogo.png" width="170" height="60" alt=""> </a>
  
  <!--Form for searchbar-->
  <form class="d-flex">
    <!--Place for weather Api to be printed-->
  <h5 style="color: <?php echo $color;?>"> Temp:</h5> <p style="color: <?php echo $color;?>" id="Temp"></p>°C 

     <!--Searchbar + search button-->
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <!--Form for logout button-->
<form class="d-flex" action="logout.php">
   <!--Logout button-->
      <button class="btn btn-outline-success" type="submit">Logout</button>
</form>

</nav>


<!--Div and secion to customize and make a small form for the profile-->
<section class="h-150 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-8">
        <div class="card" >
          
        <!--Div for profile picture background gray color-->
          <div class="rounded-top text-white d-flex flex-row  " style="background-color: #8E8E8E; height:200px;">

           <!--Div for profile picture round-->
          
          <div id="profile" class="ms-4 mt-5 d-flex flex-column profilepic align-items-center" style="width: 150px; height: 150px;">

 <!--Echos profile picture from data base and makes it round-->
              <?php echo "<img class=' profilepic__image img-responsive' id='output' src='Img/$Image' width='180' height='180''>" ?>
             
              <!--Button for Changin picture-->
              <button type="button" class="btn btn-outline-dark  profilepic__content" data-mdb-ripple-color="dark"style="z-index: 1;">Change picture </button>
            </div>
           
                  <!--Div for names-->
            <div class="ms-3" style="margin-top: 130px;">
            <!--Echos firstname + last name from database for specific user and puts them in small tittle(h5)-->
              <h5 class="d-flex"> <?php echo $FirstName, $LastName; ?> </h5> 

              <!--Echos Username from database for specific user and puts it into paragraph (p)-->
              <p>@<?php echo $UserName;  ?></p>
            </div>
          </div>
          
           <!--Div for placing followers, games, following count and for placing edit button-->
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
         

           <!--Div for edit button-->
          <div class="ms-1 mt-1 d-flex  justify-content-start flex-column " style="width: 150px;">

               <!--Div for edit button // not functional yet-->
              <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;"> Edit profile </button>
            </div>
            
             <!--Div for counting games follower and following // not functional yet-->
            <div class="d-flex mt-1  justify-content-end text-center py-1">
              
      
              <div>
            
                <p class="mb-1 h5">0</p>
                
                <p class="small text-muted mb-0">Games</p>
              </div>
              
              <div class="px-3">
                <p class="mb-1 h5">0</p>
                <p class="small text-muted mb-0">Followers</p>
              </div>
              <div>
                <p class="mb-1 h5">0</p>
                <p class="small text-muted mb-0">Following</p>
              </div>
              
            </div>
            
           
          </div>
        <!--About games and all the games (not functional yet)-->
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">About</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">Bio</p>
            
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Games</p>
              <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
            </div>
            <div class="row g-2">
              <div class="col mb-2">
                <img src="Img/ZanhourLogo.png" alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col mb-2">
                <img src="Img/ZanhourLogo.png" alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
            <div class="row g-2">
              <div class="col">
                <img src="Img/ZanhourLogo.png" alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col">
                <img src="Img/ZanhourLogo.png"  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</section>
<script src="Api.js"></script>
<script>
			$("#toggleTheme").on('change', function() {
				if($(this).is(':checked')) {
					$(this).attr('value', 'true');
					document.cookie = "theme=dark";
					location.reload();
				} else {
					$(this).attr('value', 'false');
					document.cookie = 'theme=; Max-Age=0';
					location.reload();
				}
			});
		</script>
</body>
</html>


<?php

// Setting a cookie

  // session_start();
   
   //if(session_destroy()) {
  //    header("Location: Login.php");
  // }
?>