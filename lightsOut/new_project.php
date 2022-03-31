<?php

include('database.php');
//echo "<h1>Home Page</h1>";
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
//echo "Username is: $username";


$query = "select * from profileImg where username='$username'";
$result = mysqli_query($con,$query);
$res = mysqli_fetch_array($result);

$image = $res['img'];
?>


<!DOCTYPE html>
<html>
<title>New Project</title>
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
  <a href="new_project.php" class="w3-bar-item w3-button w3-center w3-right w3-padding-large w3-white" style="height: 59px;">New Project</a>
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
        <a href="#" class="w3-bar-item w3-button w3-black">New Project</a>
    </div>
</div>

</head>

<body>
  <br>
    <div class="w3-card w3-display-container w3-round-large w3-padding-large" style="width: 70%; height: 550px; margin: auto;">
    <form action="add_project.php" method="post">
      <div>
          <input type="text" name="title" maxlength="50" placeholder="Enter Title" class="w3-display-topmiddle" style="width:50%; border: 2px solid; border-radius: 12px; padding: 5px; margin-top:20px;" required>
          <br><br>
          <textarea id="description" name="description" maxlength="600" rows="15" cols="50" placeholder="Add Description..." class="w3-display-left" style="border: 2px solid; border-radius: 12px; padding: 5px; margin-left:20px;" required></textarea>
          <br><br>
          
          <?php
          if($role=='writer')
          {
            $query2 = "select * from users where role='director'";
            $result2 = mysqli_query($con,$query2);
            $query3 = "select * from users where role='cinematographer'";
            $result3 = mysqli_query($con, $query3);
          ?>
            
            <label for="Director" class="w3-display-topright" style="width:40%; margin-top:140px; margin-right:20px;">Select Director</label>
            <select name="director" id="director" class="w3-display-topright" style="width:40%; border: 2px solid; border-radius: 12px; padding: 5px; margin-top:170px; margin-right:20px;">
            <?php while($res2 = mysqli_fetch_array($result2))
            {?>
              <option value="<?php echo $res2['username'] ?>"><?php echo $res2['username'] ?></option>
              <?php } ?>
            </select>
            <label for="cinematographer" class="w3-display-bottomright" style="width:40%; margin-bottom:230px; margin-right:20px;">Select Cinematographer</label>
            <select name="cinematographer" id="cinematographer" class="w3-display-bottomright" style="width:40%; border: 2px solid; border-radius: 12px; padding: 5px; margin-bottom:190px; margin-right:20px;">
            <?php while($res3 = mysqli_fetch_array($result3))
            {?>
              <option value="<?php echo $res3['username'] ?>"><?php echo $res3['username'] ?></option>
              <?php } ?>
            </select>
          <?php }
          elseif($role=='director')
          {
            $query2 = "select * from users where role='writer'";
            $result2 = mysqli_query($con,$query2);
            $query3 = "select * from users where role='cinematographer'";
            $result3 = mysqli_query($con, $query3);
          ?>
            
            <label for="writer" class="w3-display-topright" style="width:40%; margin-top:140px; margin-right:20px;">Select Writer</label>
            <select name="writer" id="writer" class="w3-display-topright" style="width:40%; border: 2px solid; border-radius: 12px; padding: 5px; margin-top:170px; margin-right:20px;">
            <?php while($res2 = mysqli_fetch_array($result2))
            {?>
              <option value="<?php echo $res2['username'] ?>"><?php echo $res2['username'] ?></option>
              <?php } ?>
            </select>
            <label for="cinematographer" class="w3-display-bottomright" style="width:40%; margin-bottom:230px; margin-right:20px;">Select Cinematographer</label>
            <select name="cinematographer" id="cinematographer" class="w3-display-bottomright" style="width:40%; border: 2px solid; border-radius: 12px; padding: 5px; margin-bottom:190px; margin-right:20px;">
            <?php while($res3 = mysqli_fetch_array($result3))
            {?>
              <option value="<?php echo $res3['username'] ?>"><?php echo $res3['username'] ?></option>
              <?php } ?>
            </select>
          <?php }
          else {
            $query2 = "select * from users where role='writer'";
            $result2 = mysqli_query($con,$query2);
            $query3 = "select * from users where role='director'";
            $result3 = mysqli_query($con, $query3);
          ?>
            
            <label for="writer" class="w3-display-topright" style="width:40%; margin-top:140px; margin-right:20px;">Select Writer</label>
            <select name="writer" id="writer" class="w3-display-topright" style="width:40%; border: 2px solid; border-radius: 12px; padding: 5px; margin-top:170px; margin-right:20px;">
            <?php while($res2 = mysqli_fetch_array($result2))
            {?>
              <option value="<?php echo $res2['username'] ?>"><?php echo $res2['username'] ?></option>
              <?php } ?>
            </select>
            <label for="director" class="w3-display-bottomright" style="width:40%; margin-bottom:230px; margin-right:20px;">Select Director</label>
            <select name="director" id="director" class="w3-display-bottomright" style="width:40%; border: 2px solid; border-radius: 12px; padding: 5px; margin-bottom:190px; margin-right:20px;">
            <?php while($res3 = mysqli_fetch_array($result3))
            {?>
              <option value="<?php echo $res3['username'] ?>"><?php echo $res3['username'] ?></option>
              <?php } ?>
            </select>
          <?php }
          ?>

          <button type="submit" name="submit" class="w3-button w3-black w3-display-bottommiddle" style="width:30%; border: 2px solid; border-radius: 12px; padding: 5px; margin-bottom:20px;">Post</button>
      </div>
    </form>
    </div>
</body>

</html>