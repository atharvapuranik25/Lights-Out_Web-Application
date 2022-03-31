<?php

include('database.php');
session_start();

if (isset($_POST['submit']))
{
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'mp4', 'mkv');

	if (in_array($fileActualExt, $allowed)) {
		if($fileError===0) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'posts/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);

                $username = $_SESSION['username'];
                if ($fileActualExt=='jpg' or $fileActualExt=='jpeg' or $fileActualExt=='png'){
                    $type="image";
                }
                elseif ($fileActualExt=='mp4' or $fileActualExt=='mkv'){
                    $type="video";
                }
                else {
                    $type="text";
                }
                $title = $_POST['title'];
                $description = $_POST['description'];

                $query = "insert into post (`username`,`type`,`title`,`description`,`file`) values ('$username','$type','$title','$description','$fileNameNew')";
                $result = mysqli_query($con,$query);
                $res = mysqli_affected_rows($con);

                if($res>0)
	            {
		            header("location:profile_page.php");   //here result is variable and res is key
	            }
	            else
	            {
                    // header("location:signup_page.html");
	                echo "Error!!!"; 
	            }

			} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You cannot upload files of this type!";
	}
}
else {
    echo "Not executed";
}
?>
