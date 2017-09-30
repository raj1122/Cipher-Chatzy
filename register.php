<?php
	include 'con1.php';	
	$first=$_POST['first'];
	$last=$_POST['last'];
	$name=$first." ".$last;
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	
	$name1=ucwords($name);
	
	$qr="select * from register where email='$email'";
	if(mysqli_fetch_assoc(mysqli_query($con,$qr)))
	{
		// echo "<script>alert('email exist')</script>";
		// echo "exist";
		$no_msg=array("result"=>"email_exist");
	}
	else
	{
	
		$qr1="insert into register(id,name,email,pass,img)
		 values('','$name1','$email','$pass','uploads/user.jpg')";
		if(mysqli_query($con,$qr1))
		{
			$qr2="insert into status_user 
			values('','$email','not online')";
			if(mysqli_query($con,$qr2))
			{
				$no_msg=array("result"=>"success");	
			}
			else
			{
				$no_msg=array("result"=>"insert error in status");		
			}
			
			// header("location:index.html");
		}
		else
		{
			$no_msg=array("result"=>"failed");
			// echo "failed";
		}
	}
	echo json_encode($no_msg);
?>

