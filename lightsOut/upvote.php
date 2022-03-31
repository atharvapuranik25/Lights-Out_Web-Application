<?php
include('database.php');
$username = $_GET['username'];

$query = "update users set upvotes=upvotes+1 where username='$username'";
mysqli_query($con,$query);
$query2 = "call upvote();";
mysqli_query($con,$query2);

header('location:home_page_director.php');
?>