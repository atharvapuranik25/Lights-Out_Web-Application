<?php

include('database.php');
$query = "select * from users";
$res = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html>
<title>Home Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<head>
<div class="w3-bar w3-black w3-hide-small">
  <a href="#" class="w3-bar-item w3-circle"><img src="logo2.jpg" alt="Home Page" style="width:35px"></a>
  <a href="view.php" class="w3-bar-item w3-button w3-center w3-padding-large" style="height: 59px;">Admin Home</a>
  <a href="login_page.html" class="w3-bar-item w3-button w3-center w3-right w3-padding-large" style="height: 59px;">LogOut</a>
  <a href="#" class="w3-bar-item w3-right"><img class="w3-circle w3-grayscale-max" src="admin.jpg" alt="Profile" style="width:43px; height:43px;"></a>
</div>

<br>

<hr style="display: block;
margin-top: 0.5em;
margin-bottom: 0.5em;
margin-left: auto;
margin-right: auto;
border-style: inset;
border-width: 1px;
width:90%;">

<br>

</head>

    <body>
        <center>
            <table border="2px" cellspacing="8px" cellpadding="10px">
                <tr>
                    <th>S.No.</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Skill Level</th>
                    <th>Upvotes</th>
                    <th>Operation</th>
                </tr>
                <?php
                $x=1;
                    while($rs=mysqli_fetch_array($res))
                    {
                        $email = $rs['email'];
                        $passcode = $rs['passcode'];
                        $username = $rs['username'];
                        $role = $rs['role'];
                        $skill_level = $rs['skill_level'];
                        $upvotes = $rs['upvotes'];                
                ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $passcode; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $role; ?></td>
                    <td><?php echo $skill_level; ?></td>
                    <td><?php echo $upvotes; ?></td>
                    <td><a href="update.php?username=<?php echo $username ?>">Update</a> &nbsp; || &nbsp; <a href="delete.php?username=<?php echo $username ?>">Delete</a></td>
                </tr>
                <?php
                $x++;    }
                    ?>
            </table>
        </center>
    </body>
</html>