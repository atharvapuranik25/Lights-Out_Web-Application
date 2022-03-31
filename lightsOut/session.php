<?php
include('database.php');

$admin_email = $_POST['email']; 
$admin_passcode = $_POST['passcode'];

if($admin_email=='admin@gmail.com' and $admin_passcode=='pass')
{
    header('location:view.php');
}
else{
session_start();

$res = loginUser($_POST);

//depending on the input you get from $res add if/else
if(!empty($res))
    {
            $username = $res ['username'];
            $email = $res ['email'];
            $role = $res ['role'];

            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            header('location:home_page_writer.php');
    }
    else{
        header('location:login_page.html');
    }
}
?>