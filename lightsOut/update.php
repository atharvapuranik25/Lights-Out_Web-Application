<?php
   include('database.php');
   $username = $_GET['username'];  //id : key and $id : variable
   
   $std = getUser($username);
?>

<html>
  <head>
    <title>Update data</title>
  </head>
  <body>
   <center>
     <form action="edit.php" method="get">
	   <input type="text" value="<?php echo $std['email'];?>" name="email" readonly><br><br> 
	   <input type="text" value="<?php echo $std['passcode'];?>" name="passcode"><br><br>
	   <input type="text" value="<?php echo $std['username'];?>" name="username" readonly><br><br>
	   <input type="text" value="<?php echo $std['role'];?>" name="role" readonly><br><br>
	   <input type="text" value="<?php echo $std['skill_level'];?>" name="skill_level"><br><br>
	   <input type="text" value="<?php echo $std['upvotes'];?>" name="upvotes"><br><br>
	 
	   <input type="submit" value="Submit Data"><br><br>
	 </form>
   </center>
  </body>
</html>