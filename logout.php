<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include'con1.php';
	session_start();

	$ema11=$_SESSION['email'];
	$qr="update status_user set stat='not online' where email='$ema11'";
	if(mysqli_query($con,$qr))
	{
		echo "<script>console.log('logout suceess');</script>";
		session_destroy();
		echo "<script>window.location.href='index.html'</script>";
	}
	else
	{
		echo "<script>console.log('logout failed');</script>";	
	}
	
?>
</body>
</html>