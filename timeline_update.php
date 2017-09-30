<?php
	session_start();
    include 'connect.php';
    if($_SERVER["REQUEST_METHOD"]=='POST')
    {
    	$timeline_text=$_REQUEST['timeline_text'];
        $tie=$_POST['tie'];
        // echo "<Script>console.log('tiw',$tie);</Script>";
    	$timeline_text=trim($timeline_text);
    	$sid=$_SESSION['email'];
    	date_default_timezone_set("Asia/Kolkata");
        $date1 = date('Y-m-d H:i:s');
        // echo "<Script>console.log("date",$date1);</Script>";
        $qr="insert into picture_upload values('','$sid','$timeline_text','$tie','$date1')";
        if (mysqli_query($con,$qr))
        {
        	$qr1="select * from register where email='$sid'"; 
        	$result1=mysqli_query($con,$qr1);
        	$row1=mysqli_fetch_assoc($result1);
        	$arr=array("user"=>$row1['name'],"text"=>$timeline_text,"date"=>$date1);            
        	echo json_encode($arr);
        }
    }
    else
    {
        header('Location:index.html');
    }


?>