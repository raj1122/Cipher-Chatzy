<?php
	include 'con1.php';
	session_start();
if(isset($_SESSION['email']))
{	
	$email=$_SESSION['email'];
	$data=$_REQUEST['data'];
	$about=$data[0];
	
	$qr="update status_user set about='$about' where email='$email'";
	if(mysqli_query($con,$qr))
	{
		echo "yes";
	}
	else
	{
		echo "no";
	}
}
else
{
	header('Location:index.html');
}
?>