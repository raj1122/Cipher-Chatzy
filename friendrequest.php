<?php
    session_start();
    include 'connect.php';
    if($_SERVER["REQUEST_METHOD"]=='POST')
    {

        
        $rid=$_POST['rid'];
        $sid=$_SESSION['email'];        
        $qr="insert into partner values('',0,'$rid','$sid')";
        if(mysqli_query($con,$qr))
        {
            header("Location: people.php");
        }
        else
        {
            echo "failed";
        }
        
    }
    else
    {
        header('Location:index.html');
    }

?>