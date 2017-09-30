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
			if($row['stat']=='online')
			{
				echo "online";
			}
			else
			{
				echo "not online";
			}
		}
	}
}
else
{
	header('Location:index.html');
}

?>