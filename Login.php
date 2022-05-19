<?php

//runs code that is in config.php
   include("config.php");
  //start session
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

   

      $username = mysqli_real_escape_string($Conn,$_POST['username']);
      $password = mysqli_real_escape_string($Conn,$_POST['password']); 

      //gets username from database
      $sql = "SELECT * FROM register WHERE username = '$username'";
      
      $result = mysqli_query($Conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $secpass = $row['password'];
      $count = mysqli_num_rows($result);
//if count == 1 and password is the same as the secure password then login and send to profile.php
      if($count == 1) {
        if(password_verify($password, $secpass)){
          $_SESSION['username']= "username";
          $_SESSION['login_user'] = $username;
          header("location: profile.php");
        }
      }else {
         $error = print("Your Login Name or Password is invalid");
      }
   }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>


<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>

                <form class="mx-1 mx-md-4" action="" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="username" required />
                      <label class="form-label" for="form3Example1c">Username</label >
                    </div>
                  </div>
            
                 
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password" required />
                      <label class="form-label" for="form3Example4c">Password</label><br><a href="resetpass.php">Forgot password?</a>
                      
                    </div>
                  </div>

                 

              
                  <div class="form-check d-flex justify-content-center mb-5">
                   
                <label>
                      Not a member? <a href="index.php">Sign up</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Log in</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

               <a href="#"><img src="Img/ZanhourLogo.png" class="img-fluid" alt="Sample image"></a> 

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>


<?php


?>