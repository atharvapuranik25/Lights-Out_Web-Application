<?php
   session_start();
   $username = $_SESSION['username'];
   
   if(isset($username))
   {
	   session_destroy();
	   header('location:login_page.html');
   }
?>