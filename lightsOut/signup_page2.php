<?php
  include('database.php');
  session_start();
?>

<!DOCTYPE html>
<html>
<title>Light'sOut!-SignUp</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<head>
    <style>
    body {
      background-image: url('bgimg_text6.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    </style>
</head>

<body>

<div class="w3-container">

  <div class="w3-card-4 w3-white w3-display-right  w3-round-large" style="width:30%; height:80%; margin-right: 100px;">
  <br>
    <div class="w3-container w3-center">
      <img src="logo.jpg" alt="Logo" style="width:7%">
      <h3>Light's Out</h3>
      <h6 style="font-style: italic;">For people who love and live Cinema</h6>
      <br>


      <form action="insert2.php" method="post" enctype="multipart/form-data">

        <input type="file" name="file" style="width:80%; border: 2px solid; border-radius: 12px; padding: 5px;" required>
        <br><br>
        <label for="bio">Tell us something about yourself (200 characters):</label><br>
        <textarea maxlength="200" id="bio" name="bio" rows="10" cols="40" required></textarea>
        <br>
        <div>
          <button type="submit" name="submit" class="w3-button w3-black" style="width:30%; border: 2px solid; border-radius: 12px; padding: 5px;">SignUp</button>
        </div>
      </form>
    
      </div>
  </div>
</div>

</body>
</html>