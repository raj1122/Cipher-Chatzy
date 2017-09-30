<?php 
	include 'connect.php';
	session_start();
	if(isset($_SESSION['email']))
	{
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        //H:i:s

		$email=$_SESSION['email'];
        $tie=$_POST['tie'];
		$target_dir="uploads/";
		$target_file=$target_dir.basename($_FILES["fileToUpload"]["name"]);
		$uploadok=1;
		$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
		if(isset($_POST["submit"]))
		{
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    		if($check !== false)
    		{
        		//echo "File is an image - " . $check["mime"] . ".";
        		$uploadOk = 1;
    		}
    		else
    		{
        		echo "File is not an image.";
        		$uploadOk = 0;
    		}

    		if ($uploadOk == 0)
    		{
    			echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			}
			else
			{
    			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    			{
        			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        			$qr="insert into picture_upload
                     values('','$email','$target_file','$tie','$date')";
        			if(mysqli_query($con,$qr))
        			{
                        if($tie=='picture')
        				    header("location:profile.php");
                        else
                            header("location:home1.php");

        			}
        			else
        			{
        				echo "fail";
        			}

    			}
    			else
    			{
        			echo "Sorry, there was an error uploading your file.";
    			}
			}
		}

	}
	else
    {
            
        header("Location:index.html");
    }
	
 ?>