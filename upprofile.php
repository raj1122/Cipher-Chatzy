<?php
session_start();
$email=$_SESSION['email'];
include 'connect.php';
session_start();
if(isset($_SESSION['email']))
{
	$data=$_REQUEST['data'];
	$name=$data[0]." ".$data[1];
	$city=$data[2];
	$country=$data[3];
	$phone=$data[4];
	$qr=mysqli_query($con,"UPDATE `register` SET `name`='$name' ,`city`='$city',`country`='$country',`phone`='$phone' WHERE email='$email'");
	if(mysqli_affected_rows($con)>0 || $qr)
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


//var_dump($_REQUEST);
?>