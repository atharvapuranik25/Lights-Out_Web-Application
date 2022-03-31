<?php

include('database.php');

session_start();

if (isset($_POST['submit']))
{
	//add if ($_FILES['file']===null)
	//create an array with the default image and bio and the pass that array in insert image function
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($fileActualExt, $allowed)) {
		if($fileError===0) {
			if ($fileSize < 1000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
                $_SESSION['fileName'] = $fileNameNew;
				//header("location: signup_page.html?uploadsucess");

                $result = insertImg($_POST);

                if($result>0)
	            {
		            header("location:home_page_writer.php");   //here result is variable and res is key
	            }
	            else
	            {
                    // header("location:signup_page.html");
	                echo "Error!!!"; 
	            }

			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You cannot upload files of this type!";
	}
}
?>