<?php
//runs code that is in config.php
   include('config.php');
   session_start();
   
   //checks user credentials
   $user_check = $_SESSION['login_user'];
   $sql = "SELECT * FROM register WHERE username = '$user_check'";
   $ses_sql = mysqli_query($Conn,"select username from register where username = '$user_check' ");
   
   $query = mysqli_query($Conn, $sql);
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

 
    
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:Login.php");
      die();
   }

   while ($row = mysqli_fetch_array($query)) {
      $FirstName = $row['firstname'];
      $LastName = $row['lastname'];
      $UserName = $row['username'];
      $Image = $row['Image'];
    }
?>