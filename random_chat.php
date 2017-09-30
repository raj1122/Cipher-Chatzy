<?php
	session_start();
	include 'connect.php';
	
if(isset($_SESSION['email']))
{
	$sid=$_POST['data'];
	$ch=array();
	$qr="SELECT * FROM register where email!='$sid' ORDER BY RAND() LIMIT 1";
	$result=mysqli_query($con,$qr);
	$row=mysqli_fetch_assoc($result);
	
	$rid=$row['email'];
	// echo "<script>console.log($rid);</script>";
	$qr1="select *  from chat where (sid='$sid' and rid='$rid')
	 or(sid='$rid' and rid='$sid')";
	$result1=mysqli_query($con,$qr1);
	if(mysqli_num_rows($result1)>0)
	{
		while ($row1=mysqli_fetch_assoc($result1))
		{
		    if($row1['sid']==$sid)
            {
				$qr4="select *  from register where email='$sid'";
            }
			else
			{
				$qr4="select *  from register where email='$rid'";
			}
            $result4=mysqli_query($con,$qr4);   
			$row4=mysqli_fetch_assoc($result4);
			echo mysqli_error($con);
			$name=$row4['name'];			
			$row1['name']=$name;
			$img=$row4['img'];
			// echo "<script>console.log($img);</script>";
			$row1['img']=$img;
			array_push($ch,$row1);
		}
	}
	else
	{
		$no_msg=array("no message"=>"no message","rid"=>$rid);
                //echo 
        array_push($ch,$no_msg);
	}
	echo json_encode($ch);
	

}
else
{
        header('Location:index.html');
}

	// mt_rand()
?>