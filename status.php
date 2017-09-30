<?php
	session_start();
	include 'con1.php';
	
if(isset($_SESSION['email']))
{
	$data=$_REQUEST['data'];
	$sid=$data[0];
	$qr="Select * from status_user where email='$sid'";
	$result=mysqli_query($con,$qr);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$stat=$row['stat'];
			if($stat=='online')
			{
				// echo "online to offline";
				$stat="online to offline";
			$qr1="update status_user set stat='not online' where email='$sid'";
			}
			else
			{
			$qr1="update status_user set stat='online' where email='$sid'";
				// echo "not online";
				$stat="offline to online";
			}
			if(mysqli_query($con,$qr1))
			{
				echo $stat;
			}
			else
			{
				echo "Error";
			}
		}
	}
}
else
{
        header('Location:index.html');
}

?>