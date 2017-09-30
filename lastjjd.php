<?php
include 'connect.php';
session_start();
if(isset($_SESSION['email']))
{
	
    $qr1="update last_msg set text='dd' where sid='r.rajkumarr@outlook.com' or sid='r.rajkumarr@outlook.com'";
    if(mysqli_query($con,$qr1))
    {
    	echo "s";
    }
    else
    {
    	echo "f";	
    }

}
    else
    {
        header('Location:index.html');
    }
?>
