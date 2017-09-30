<?php
	include 'connect.php';
	session_start();
if(isset($_SESSION['email']))
{
	$user=$_POST['data'];
	$ch=array();
	// echo "<Script>console.log($user);</Script>";
	$qr="select email,path,date,typee from picture_upload where email='$user' and (typee='timeline' or typee='timeline_txt') order by date desc";
	$result=mysqli_query($con,$qr);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$em=$row['email'];
			$qr1="select * from register where email='$em'";
			$result1=mysqli_query($con,$qr1);
			$row1=mysqli_fetch_assoc($result1);
			$row['name']=$row1['name'];
			array_push($ch, $row);
		}
		echo json_encode($ch);
	}
}
else
{
        header('Location:index.html');
}
?>