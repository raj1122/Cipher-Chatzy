<?php
session_start();
include 'con1.php';
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
echo "<script>console.log('Debug logcheck:".$pass."' );
        </script>";
//echo $email."<br>";
//echo $pass."<br>";
if($email!="" && $pass!="")
{
	$qr="select * from register where email='$email' and pass='$pass'";
	$result=mysqli_query($con,$qr);
	//$row=mysqli_fetch_assoc($result);
	if($result)
	{
		$qr1="update status_user set stat='online' where email='$email'";
		if(mysqli_query($con,$qr1))
		{
			$_SESSION['email']=$email;
			$_SESSION['pass']=$pass;
		
			echo "<script>window.location.href='home1.php'</script>";
		}
		else
		{
			echo "unable to online";
		}
		
	}
	else
	{
		//echo "<br>"."failed";
		//echo "<script>alert('invalid username/password');";
		echo "<script>window.location.href='login.php'</script>";
	}
}
else
{
	echo "usename Not Be Blanked";
}
?>
