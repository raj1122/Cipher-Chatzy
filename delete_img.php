<?php
session_start();
include 'connect.php';
if(isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	$data=$_REQUEST['data'];
	// echo "<script>console.log( 'Data path: " . $data . "' );</script>";
	// echo "<script>console.log( 'email: " . $email . "' );</script>";
	$qr="delete  from picture_upload WHERE email='$email' and path='$data'";
	if(mysqli_query($con,$qr))
	{
		echo "true";
	}
	else
	{
		echo "false";
	}
}
else
{
        header('Location:index.html');
}
?>