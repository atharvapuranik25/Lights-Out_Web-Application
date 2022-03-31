<?php
   include('database.php');
   $res = updateUser($_GET);
   if($res)
   {
	   //echo "Success ....$res";
       header('location:view.php');
   }
   else
   {
	echo "Failed to update $res";
    //header('location:error.php');
   }
?>