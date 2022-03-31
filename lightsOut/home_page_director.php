<?php

include('database.php');
session_start();
$username = $_SESSION['username'];

$query = "select * from profileImg where username='$username'";
$result = mysqli_query($con,$query);
$res = mysqli_fetch_array($result);

$image = $res['img'];

$query_profiles_1 = "select * from users where role='director' and username != '$username'";
$res = mysqli_query($con,$query_profiles_1);
?>


<!DOCTYPE html>
<html>
<title>Home Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->


<head>
<div class="w3-bar w3-black w3-hide-small">
  <a href="#" class="w3-bar-item w3-circle"><img src="logo2.jpg" alt="Home Page" style="width:35px"></a>
  <a href="home_page_director.php" class="w3-bar-item w3-button w3-center w3-white w3-padding-large" style="height: 59px;">Home</a>
  <a href="#" class="w3-bar-item w3-button w3-center w3-padding-large" style="height: 59px;">Search</a>  
  <a href="logout.php" class="w3-bar-item w3-button w3-center w3-right w3-padding-large" style="height: 59px;">LogOut</a>
  <a href="profile_page.php" class="w3-bar-item w3-right"><img class="w3-circle w3-greyscale-max" src="uploads/<?php echo $image; ?>" alt="Profile" style="width:43px; height:43px;"></a>
  <a href="new_project.php" class="w3-bar-item w3-button w3-center w3-right w3-padding-large" style="height: 59px;">New Project</a>
  <a href="new_post.php" class="w3-bar-item w3-button w3-center w3-right w3-padding-large" style="height: 59px;">New Post</a>
</div>

<hr style="display: block;
margin-top: 0.5em;
margin-bottom: 0.5em;
margin-left: auto;
margin-right: auto;
border-style: inset;
border-width: 1px;
width:90%;">

<div class="w3-center">
<div class="w3-bar w3-border">
    <a href="home_page_writer.php" class="w3-bar-item w3-button">Writers</a>
    <a href="home_page_director.php" class="w3-bar-item w3-button w3-black">Directors</a>
    <a href="home_page_cinematographer.php" class="w3-bar-item w3-button">Cinematographers</a>
  </div>
  <br><br>
</div>
</head>

<body>
  
<?php
while($rs = mysqli_fetch_array($res))
{
  $email = $rs['email'];
  $passcode = $rs['passcode'];
  $username_2 = $rs['username'];
  $role = $rs['role'];
  $skill_level = $rs['skill_level'];
  $upvotes = $rs['upvotes'];

  $query_profiles_2 = "select * from profileImg where username='$username_2'";
  $res_2 = mysqli_query($con,$query_profiles_2);
  $rs_2 = mysqli_fetch_array($res_2);
  $img = $rs_2['img'];
  $bio = $rs_2['bio'];
?>

    <div class="w3-card w3-display-container w3-round-large" style="width: 90%; height: 190px; margin: auto;">
          <img src="uploads/<?php echo $img; ?>" alt="Avatar" class="w3-display-left w3-circle w3-grayscale-max" style="width:150px; height:150px; margin-left: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <div>
          <h2 class="w3-display-topleft" style="margin-left: 200px"><a href="profile_page_2.php?username=<?php echo $username_2; ?>"><?php echo $username_2; ?></a></h2>            <h4 class="w3-display-topmiddle" style="margin-top: 18px">Skill Level: <?php echo $skill_level; ?></h4 >
            <button onclick="document.location='upvote.php?username=<?php echo $username_2 ?>'" class="w3-button w3-black w3-display-topright" style="width:10%; border: 2px solid; border-radius: 12px; margin-top:10px; margin-right:20px;">Upvote - <?php echo $upvotes; ?></button>
          </div>
          <h4 class="w3-display-topleft" style="margin-left: 200px; margin-top: 55px;"><?php echo $role; ?></h4>
          <p class="w3-display-bottomleft" style="margin-left: 200px; margin-right: 20px; margin-bottom:20px"><?php echo $bio; ?></p>
    </div>
    <br>
  <?php
}
?>

  </body>

</html> 