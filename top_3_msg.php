<?php
    session_start();
	include 'connect.php';
    
if(isset($_SESSION['email']))
{    
	$ch=array();
    $user=$_REQUEST['data'];
    // echo "<script>console.log('top_3_msg".$user."');</script>";
    
    $qr5="select  * from recent_chat where (sid='$user' or rid='$user') ORDER BY id limit 3";
    $result5=mysqli_query($con,$qr5);
    if(mysqli_num_rows($result5)>0)
    {
        while ($row5=mysqli_fetch_assoc($result5))
        {
            // echo "<script>console.log( 'Debug Objects: " . $row5['msg']. "' );</script>";
            if($row5['sid']==$user)
            {
                $rid=$row5['rid'];
                $qr6="select name  from register where email='$rid'";
            }
            else
            {
                $sid=$row5['sid'];
                $qr6="select name  from register where email='$sid'";
            }
            $result6=mysqli_query($con,$qr6);
            $row6=mysqli_fetch_assoc($result6);
            echo mysqli_error($con);
            $name6=$row6['name'];
            $row5['name']=$name6;
            array_push( $ch,$row5);

        }
        //echo json_encode($ch);
        //echo "<script>console.log('".$ch[0]."')</script>";
    }
    else
    {
        //echo "<script>console.log('error')</script>";
        $no_msg=array("no message"=>"no message");
                //echo 
        array_push($ch,$no_msg);
    }  
    echo json_encode($ch);  
}
else
{
        header('Location:index.html');
}


?>