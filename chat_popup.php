<?php
session_start();
include 'connect.php';
$ch=array();

if(isset($_SESSION['email']))
{
        $rid=$_REQUEST['rid'];
        $sid=$_REQUEST['sid'];
        $qr3="select *  from chat where (sid='$sid' and rid='$rid') or(rid='$sid' and sid='$rid')";
        $result3=mysqli_query($con,$qr3);
        if(mysqli_num_rows($result3)>0)
        {
                while($row3=mysqli_fetch_Assoc($result3))
                {                 
                        if($row3['sid']==$sid)
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
                        $row3['name']=$name;
                        $img=$row4['img'];
                        $row3['img']=$img;
                        array_push($ch,$row3);
                        //echo json_encode($ch);
                }
        }
        else
        {
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