<?php

include('database.php');

$result = insertUser($_POST);

if($result>0)
	 {
		 session_start();
		 $username = $_POST ['username'];
		 $email = $_POST ['email'];
		 $role = $_POST ['role'];

		 $_SESSION['username'] = $username;
		 $_SESSION['email'] = $email;
		 $_SESSION['role'] = $role;

		header("location:signup_page2.php");
	 }
	 else
	 {
         header("location:signup_page.html");
	 }
?>