<?php
	include 'connect.php';
	session_start();
if(isset($_SESSION['email']))
{	
	$rid=$_SESSION['email'];
	$sid=$_POST['sid'];
	$qr="delete from partner where rid='$rid' and sid='$sid'";
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