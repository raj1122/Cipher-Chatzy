<?php
	session_start();
    include 'connect.php';
    if($_SERVER["REQUEST_METHOD"]=='POST')
    {
    	$email=$_SESSION['email'];

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
        			$qr="update register set img='$target_file' where email='$email'";
        			if(mysqli_query($con,$qr))
        			{
                        header("location:profile.php");
                        //echo "succes";

        				// $qr11="select * from register where email='$email'";
        				// $result11=mysqli_query($con,$qr11);
        				// $rot=mysqli_fetch_assoc($result11);
            //             //echo $rot['img'];
        				// $arr=array("user"=>$rot['img']);
            // 			echo json_encode($arr);
        			}
        			else
        			{
                        echo "mysli error";
            //             //echo "fail";
        				// $arr=array("user"=>"fail");
            //             echo json_encode($arr);
        			}

    			}
    			else
    			{
                    echo "error upload";
                    // //echo "fail2";
                    // $arr=array("user"=>"Sorry, there was an error uploading your file.");
                    // echo json_encode($arr);
        			
    			}
			}
		}
    }
?>