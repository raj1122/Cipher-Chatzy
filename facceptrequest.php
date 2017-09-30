<?php
	include 'connect.php';
	session_start();
if(isset($_SESSION['email']))
{	
	$rid=$_SESSION['email'];
	$sid=$_POST['sid'];
	$qr="update partner set accept=1 where sid='$sid' and rid='$rid'";
	if(mysqli_query($con,$qr))
	{
		header("location:frequest.php");
	}
	else
	{
		echo "fail";
	}
}
else
{
        header('Location:index.html');
}
?>