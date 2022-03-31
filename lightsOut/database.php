<?php
  
     $con = mysqli_connect('localhost','root','','website') or die("<h1>Connection failed...</h1>");
     
     function insertUser($array)
     {
         global $con;
         $email = $array['email'];
         $username = $array['username'];
         $role = $array['role'];
         $passcode = $array['passcode'];


         if($con)
         {
         $query = "insert into users values('$email','$passcode','$username','$role','novice',0)";
         mysqli_query($con,$query);
         $res = mysqli_affected_rows($con);
         return $res;
         }
     }
     
     function insertImg($array)
     {
         global $con;
         $bio = $array['bio'];
         $username = $_SESSION['username'];
         $img = $_SESSION['fileName'];

         if($con)
         {
             $query = "insert into profileImg (`username`, `img`, `bio`) values ('$username','$img','$bio')";
             mysqli_query($con,$query);
             $res = mysqli_affected_rows($con);
             return $res;
         }
     }

     function loginUser($array)
     {
         global $con;
         $email = $array['email'];
         $passcode = $array['passcode'];
         
         $query = "select * from users where email = '$email' and passcode = '$passcode'";
         $result = mysqli_query($con,$query);
         $res = mysqli_fetch_array($result);
         return $res;
         
     }

     function getUser($username)
	{
		global $con;
		$query = "select * from users where username = '$username'";
		$rs1 = mysqli_query($con,$query);
		$result = mysqli_fetch_array($rs1);
		return $result;
	}

    function updateUser($array)
	{
		global $con;

		$email = $array['email'];
        $passcode = $array['passcode'];
		$username = $array['username'];
		$role = $array['role'];
		$skill_level = $array['skill_level'];
		$upvotes = $array['upvotes'];
	 
    	$query = "update users set email='$email',passcode = '$passcode',username='$username',role='$role',skill_level='$skill_level',upvotes='$upvotes' where username = '$username'";
		mysqli_query($con,$query);  
		$res = mysqli_affected_rows($con);  //1 : success ,0 data not insert and -1 query error
		
        return $res; 		
	}

    function deleteUser($username)
	{
		global $con;
        $query0 = "delete from post where username = '$username'";
		mysqli_query($con,$query0);
		$rs0 = mysqli_affected_rows($con);
		$query = "delete from project where username = '$username'";
		mysqli_query($con,$query);
		$rs = mysqli_affected_rows($con);
        $query2 = "delete from profileimg where username = '$username'";
		mysqli_query($con,$query2);
		$rs2 = mysqli_affected_rows($con);
        $query3 = "delete from users where username = '$username'";
		mysqli_query($con,$query3);
		$rs3 = mysqli_affected_rows($con);
	    return $rs3;
	}

?>