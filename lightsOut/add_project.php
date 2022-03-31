<?php

include('database.php');
session_start();
$title = $_POST['title'];
$description = $_POST['description'];
$username = $_SESSION['username'];
$role = $_SESSION['role'];

if($role=='writer'){
    $writer = $username;
    $director = $_POST['director'];
    $cinematographer = $_POST['cinematographer'];
} elseif($role=='director'){
    $writer = $_POST['writer'];
    $director = $username;
    $cinematographer = $_POST['cinematographer'];
} else{
    $writer = $_POST['writer'];
    $director = $_POST['director'];
    $cinematographer = $username;
}

$query = "insert into project (`title`,`description`,`writer`,`director`,`cinematographer`) values ('$title','$description','$writer','$director','$cinematographer')";
$result = mysqli_query($con,$query);
$res = mysqli_affected_rows($con);
if($res>0)
	            {
		            header("location:profile_page.php");
	            }
	            else
	            {
	                echo "Error!!!"; 
	            }
?>