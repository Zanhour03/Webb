<?php

$Conn = mysqli_connect('localhost', 'root', '', 'zanhourgame');
//runs code that is in config.php
include("config.php");

if(isset($_POST['register']))  //Runs if register is connected
{

  $firstname = $_POST['Name']; 
  $lastname = $_POST['lastName'];
  $email = $_POST['mail'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $secure_pass = password_hash($password, PASSWORD_DEFAULT);


  $filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "Img/" . $filename;



$allowed = array('gif', 'png', 'jpg', 'svg', ); //Allowed files
$ext = pathinfo($filename, PATHINFO_EXTENSION);

 //Input for the database
    $sql_u = "SELECT * FROM register WHERE username='$username'";
  	$sql_e = "SELECT * FROM register WHERE email='$email'";

    $sql = "INSERT INTO register(firstname, lastname, email, username, password, Image) VALUES ('$firstname',' $lastname',' $email', '$username','$secure_pass', '$filename')";
            
   
  	$res_u = mysqli_query($Conn, $sql_u);
  	$res_e = mysqli_query($Conn, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken"; 	
      
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "There is already an account registered with this email"; 	
  	}else{
    
         
  	}

//Checks filesize
if(filesize("$filename") < 5000000){
  if (!in_array($ext, $allowed)) {
    echo 'Error: Cannot upload file';
  } else if (move_uploaded_file($tempname, $folder)){
    echo "Image uploaded successfully";
    mysqli_query($Conn, $sql);
    header("Location: Login.php");
    exit();
  } else {
    echo "Failed to upload image";
  }
}
else{
  echo "$filename is bigger than allowed";
}
}

if(!$Conn){
  die("connection failed" .mysqli_Connect_error());
}


$Conn->close();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>




<section class="vh-110" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

<form class="mx-1 mx-md-4 form" action="#" method="post" enctype="multipart/form-data">
<!--Upload a profile pic-->
<div id="profile" class="ms-5 mx-md-auto mt-5 d-flex flex-column profilepic align-items-center" style="width: 150px; height: 150px;">
  <img class=" profilepic__image img-responsive"  id="output" src="Img/blank.png" width="180" height="180" alt="Profibild" />
  <div class="profilepic__content">
    <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
    <span class="profilepic__text"><input type="file" id="img_file" name="uploadfile" onchange= "loadFile(event)" />Choose Pic</span>
  </div>
</div>
<!--end-->

<!--script to preview ulpoaded image -->
<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
<!--end-->
                <br>
                  <!--Form for firstname-->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="Name" required />
                      <label class="form-label" for="form3Example1c">First Name</label >
                    </div>
                  </div>
                    <!--end-->

                     <!--Form for firstname-->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas  fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="lastName" required />
                      <label class="form-label" for="form3Example1c">Last Name</label >
                    </div>
                  </div>
                  <!--end-->

                   <!--Form for lastname-->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control"  name="mail" required/>
                      <label class="form-label" for="form3Example3c">Your Email</label> <?php if (isset($email_error)): ?><span><?php echo $email_error; ?></span><?php endif ?>
                    </div>
                  </div>
                           <!--end-->

              <!--Form for Username-->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="username" required />
                      <label class="form-label" for="form3Example1c">Username</label >  <?php if (isset($name_error)): ?><span ><?php echo $name_error; ?></span><?php endif ?>
                    </div>
                  </div>
                           <!--end-->
                
                   <!--Form for password-->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" type="submit" id="password" class="form-control" name="password" required />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>
                    <!--end-->

                     <!--Form for repeat password-->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="repassword" class="form-control" name="repassword" required />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                    <!--end-->

                    
                    <script type="text/javascript">
                      //Code to validate passowrd so it matches
    $(function () {
        $("#register").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#repassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                $('#message').html('Password Not Matching').css('color', 'red');
                return false;
            }
            return true;
        });
    });
</script>


                  </div>
                  <span id='message'></span>
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c"name="terms" required />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="terms.html">Terms of service</a>
                    </label>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                   
                <label>
                      Already a member? <a href="Login.php">Log In</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button id="register" name="register" type="submit"  value="Register" class="btn btn-primary btn-lg">Register</button>
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

<script src="java.js"></script>
</body>
</html>


