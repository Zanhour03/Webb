<?php
   session_start();
   //code for logout button ends session and sends user to loginpage
   if(session_destroy()) {
      header("Location: Login.php");
   }
?>