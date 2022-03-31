<?php
  
   include('database.php');
   $username = $_GET['username'];
   
   $result = deleteUser($username);   
   if($result>0)
   {
	  // echo "<h1>Data Successfully delete....$result</h1>";
      header('location:view.php');
   }
   else
   {
	   echo "<h1>Data Not Deleted.....$result</h1>";
   }
?>