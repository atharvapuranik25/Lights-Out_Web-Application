<?php
include('database.php');
session_start();
$username = $_SESSION['username'];

$query = "select * from profileImg where username='$username'";
$result = mysqli_query($con,$query);
$res = mysqli_fetch_array($result);

$image = $res['img'];
$username_2 = $_GET['username'];

$query2 = "select * from users where username='$username_2'";
$result2 = mysqli_query($con,$query2);
$res2 = mysqli_fetch_array($result2);

$role = $res2['role'];
$skill_level = $res2['skill_level'];
$upvotes = $res2['upvotes'];

$query3 = "select * from profileImg where username = '$username_2'";
$result3 = mysqli_query($con, $query3);
$res3 = mysqli_fetch_array($result3);

$bio = $res3['bio'];
$image2 = $res3['img'];

$query4 = "select * from post where username = '$username_2'";
$result4 = mysqli_query($con,$query4);
?>


<!DOCTYPE html>
<html>
<title>Profile Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->


<head>
<div class="w3-bar w3-black w3-hide-small">
  <a href="#" class="w3-bar-item w3-circle"><img src="logo2.jpg" alt="Home Page" style="width:35px"></a>
  <a href="home_page_director.php" class="w3-bar-item w3-button w3-center w3-padding-large" style="height: 59px;">Home</a>
  <a href="#" class="w3-bar-item w3-button w3-center w3-padding-large" style="height: 59px;">Search</a>  
  <a href="logout.php" class="w3-bar-item w3-button w3-center w3-right w3-padding-large" style="height: 59px;">LogOut</a>
  <a href="profile_page.php" class="w3-bar-item w3-right"><img class="w3-circle w3-greyscale-max" src="uploads/<?php echo $image; ?>" alt="Profile" style="width:43px; height:43px;"></a>
  <a href="new_project.php" class="w3-bar-item w3-button w3-center w3-right w3-padding-large" style="height: 59px;">New Project</a>
  <a href="new_post.php" class="w3-bar-item w3-button w3-center w3-right w3-padding-large" style="height: 59px;">New Post</a>
</div>

<div class="w3-display-container">
          <img src="uploads/<?php echo $image2; ?>" alt="Avatar" class="w3-display-left w3-circle w3-grayscale-max" style="width:200px; height:200px; margin-left: 100px; margin-top: 125px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <div>
            <h1 class="w3-display-topleft" style="margin-left: 350px; margin-top: 20px"><?php echo $username_2; ?></h1>
            <h3 class="w3-display-topright" style="margin-top: 150px; margin-right:100px;">Skill Level: <?php echo $skill_level; ?></h3 >
            <button class="w3-button w3-black w3-display-topright" style="width:10%; border: 2px solid; border-radius: 12px; margin-top:40px; margin-right:100px;">Upvote - <?php echo $upvotes; ?></button>
          </div>
          <h3 class="w3-display-topleft" style="margin-left: 350px; margin-top: 70px;"><?php echo $role; ?></h3>
          <p class="w3-display-topleft" style="margin-left: 350px; margin-right: 400px; margin-top: 120px"><?php echo $bio; ?></p>
</div>

<hr style="display: block;
margin-top: 250px;
margin-bottom: 0.5em;
margin-left: auto;
margin-right: auto;
border-style: inset;
border-width: 1px;
width:90%;">

<div class="w3-center">
    <div class="w3-bar w3-border">
    <a href="#" class="w3-bar-item w3-button w3-black">Portfolio</a>
    </div>
</div>
<br>
</head>

<body>


  <?php
    while($rs = mysqli_fetch_array($result4))
    {
      $type = $rs['type'];
      $title = $rs['title'];
      $description = $rs['description'];
      $file = $rs['file'];

      if ($type=="image")
      {
  ?>

    <div class="w3-card w3-display-container w3-round-large" style="width: 80%; height: 250px; margin: auto;">
          <img src="posts/<?php echo $file; ?>" alt="Avatar" class="w3-display-left" style="width:200px; height:210px; margin-left: 30px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <h2 class="w3-display-topleft" style="margin-left: 260px"><?php echo $title; ?></h2>
            <h4 class="w3-display-topleft" style="margin-left: 260px; margin-top: 55px;"><?php echo $username_2; ?></h4>
            <p class="w3-display-bottomleft" style="margin-left: 260px; margin-right: 30px; margin-bottom:20px"><?php echo $description; ?></p>
          </div>
    <br>
    <?php
      } elseif ($type=="video") {
        ?>

    <div class="w3-card w3-display-container w3-round-large" style="width: 80%; height: 400px; margin: auto;"> 

    <video width="500" height="360" controls class="w3-display-left" style="margin-left: 30px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      <source src="posts/<?php echo $file; ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>     

            <h2 class="w3-display-topleft" style="margin-left: 560px; margin-right: 30px;"><?php echo $title; ?></h2>
            <h4 class="w3-display-topleft" style="margin-left: 560px; margin-right: 30px; margin-top: 55px;"><?php echo $username_2; ?></h4>
            <p class="w3-display-bottomleft" style="margin-left: 560px; margin-right: 30px; margin-bottom:20px"><?php echo $description; ?></p>
          </div>
          
        <br>
        <?php
          } else {

          ?>

    <div class="w3-card w3-display-container w3-round-large" style="width: 80%; height: 600px; margin: auto;"> 

    <iframe src="posts/<?php echo $file; ?>#toolbar=0" width="95%" height="400px" class="w3-display-bottommiddle" style="margin-bottom:20px">
    </iframe>     

            <h2 class="w3-display-topleft" style="margin-left: 40px"><?php echo $title; ?></h2>
            <h4 class="w3-display-topleft" style="margin-left: 40px; margin-top: 55px;"><?php echo $username_2; ?></h4>
            <p class="w3-display-topleft" style="margin-left: 40px; margin-top:95px; margin-right: 30px;"><?php echo $description; ?></p>
          </div>
        <br>
        <?php
          }
    }
?>

</body>

</html>