<?php
    session_start();
    include 'connect.php';
    if($_SERVER["REQUEST_METHOD"]=='POST')
    {

        $msg=$_REQUEST['msg'];
        $rid=$_REQUEST['rid'];
        $sid=$_SESSION['email'];
        // echo "<script>console.log('rid in aj max:".$rid."');</script>";
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $qr="insert into chat values('','$sid','$rid','$msg','$date')";

        if (mysqli_query($con,$qr))
        {   
        $qr1="select * from recent_chat where (sid='$sid' and rid='$rid') or (sid='$rid' and rid='$sid')";
        	$result1=mysqli_query($con,$qr1);
        	if(mysqli_num_rows($result1)>0)
        	{
        		while($row1=mysqli_fetch_assoc($result1))
                {
                    // echo $row1['sid'];
        		  if($row1['sid']==$sid)
        		  {
                        // echo "update 1";
        		      $qr2="update recent_chat set msg='$msg',time='$date' where(sid='$sid' and rid='$rid')";
                        if(mysqli_query($con,$qr2))
                        {
                            // echo "update";
                        }
                        else
                        {
                            // echo "fail";
                        }
        			 
            	  }
            	  else
            	  {
                    // echo "update 2";
        			$qr2="update recent_chat set msg='$msg',sid='$sid',rid='$rid',time='$date'
        				 where(sid='$rid' and rid='$sid')";
                         if(mysqli_query($con,$qr2))
                        {
                            // echo "update 2";
                        }
                        else
                        {
                            // echo "fail 2";
                        }
        				 
        		  }
                  
                }
        		
        	}
        	else
        	{
                
                
        		$qr2="insert into recent_chat(id,sid,rid,msg,time)
                 values('','$sid','$rid','$msg','$date')";
                if(mysqli_query($con,$qr2))
                {
                    // echo "success insert";
                }
                else
                {
                    // echo "Error insert";
                }
        		
        	}
            
            
            
                $qr3="SELECT * FROM `register` where email='$sid'";
                    $result3=mysqli_query($con,$qr3);
                    $row3=mysqli_fetch_assoc($result3);


                    
                    $arr=array("user"=>$row3['name'],"msg"=>$msg,"img"=>$row3['img'],
                "rid"=>$rid);
                echo json_encode($arr);
            

            
        }
    }
    else
    {
        header('Location:index.html');
    }
    
?>