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
      background-image: url('bgimg_2.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
    </style>
    
    <script>
      
    function init()
	  {
      password = document.getElementById('passcode');
	    cpassword = document.getElementById('cpasscode');
	   
	    err1 = document.getElementById('err1');
	    err2 = document.getElementById('err2');
	    err3 = document.getElementById('err3');
      err4 = document.getElementById('err4');
	  }

    
  function checkPass()
	{
	   if(cpassword.value != password.value)
	   {
	      err4.innerHTML = "Error!!! Password does not match";
		    err4.style.color="red";
	   }
	   else
	   {
	      err4.innerHTML = "";
	   }
	}
	
    </script>

</head>

<body onload="init()">

<div class="w3-container">

  <div class="w3-card-4 w3-white w3-display-right  w3-round-large" style="width:30%; height:82%; margin-right: 100px;">
  <br>
    <div class="w3-container w3-center">
      <img src="logo.jpg" alt="Logo" style="width:7%">
      <h3>Light's Out!</h3>
      <h6 style="font-style: italic;">For people who love and live Cinema</h6>


      <form action="insert.php" method="post" enctype="multipart/form-data">

        <div>
        <input type="email" name="email" placeholder="Email Address" style="width:80%; border: 2px solid; border-radius: 12px; padding: 5px;" required>
        <br><br>
        <input type="text" name="username" placeholder="Create Username" style="width:80%; border: 2px solid; border-radius: 12px; padding: 5px;" required>
        <br><br>
        <div>
          <label for="role">Choose a role:</label>
            <select name="role" id="role" style="width:80%; border: 2px solid; border-radius: 12px; padding: 5px;">
              <option value="writer">Writer</option>
              <option value="director">Director</option>
              <option value="cinematographer">Cinematographer</option>
            </select>
        </div>
        <br>
        <input type="password" name="passcode" placeholder="Create Password" style="width:80%; border: 2px solid; border-radius: 12px; padding: 5px;" required>
        <br><br>
        <input type="password" name="cpasscode" placeholder="Confirm Password" style="width:80%; border: 2px solid; border-radius: 12px; padding: 5px;" required onkeyup="checkPass()">
        <br><br>
        <div>
          <button class="w3-button w3-black" style="width:30%; border: 2px solid; border-radius: 12px; padding: 5px;" onclick="checkPass()">SignUp</button>
        </div>
      </div>
      </form>

      <h5>OR</h5>
      
      <div>
        <form action="login_page.html">
        <button class="w3-button w3-black" style="width:30%; border: 2px solid; border-radius: 12px; padding: 5px;">LogIn</button>
        </form>
      </div>
    </div>

  </div>
</div>

</body>
</html>