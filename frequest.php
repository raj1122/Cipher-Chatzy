<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Request</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />
     <!-- Page Level CSS -->
    <link href="assets/plugins/timeline/timeline.css" rel="stylesheet" />

</head>

<body>

<?php

    include 'layout1.php';
    include 'connect.php';
if(isset($_SESSION['email']))
{
?>
    <div id="page-wrapper">


        <div class="row"> 
        <!-- Page Header -->
            <div class="col-lg-12">
                <h1 class="page-header">Friend Request</h1>
            </div>
       <!--  End Page Header  -->
        </div>

        
            <?php

			$qr="select * from partner where rid='$user'and accept!=1";
			$result=mysqli_query($con,$qr);
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$sid=$row['sid'];
					$qr1="select * from register where email='$sid'";
					$result1=mysqli_query($con,$qr1);
					$row1=mysqli_fetch_assoc($result1);
			?> 
		<div class="row">       
					<div class="col-md-1 col-lg-1">
									<img src="<?php echo ($row1['img']);?>" class="img-rounded img-responsive" alt="user" width="80" height="80">
                	</div>                        
                    <div class="col-lg-2 col-md-2">
						<p class="text-primary 	text-capitalize lead">
                           <?php
                            echo ucwords($row1['name']);           
                            ?>           
						</p>
						<p style="margin-top:-25px;">
							<?php
							echo $row1['city'].", ".$row1['country'];
							?>
						</p>
					</div>            
                                  
					<?php
                    $qr2="select * from partner where rid='$user' and sid='$sid' and accept=1";            
                    $result2=mysqli_query($con,$qr2);            
                    if(mysqli_num_rows($result2)>0)            
					{
					?>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn-success">	Friends
                            </button>
                        </div>
						            
                                        
                                    
                                    

					<?php
					}
					else
					{
					?>
                        <div class="col-lg-1 col-md-1">        
                            <form  method="post" action="        facceptrequest.php">
                                
                                    <input type="hidden" name="sid" value="<?php echo  $sid;?>" class="form-control">
                                
                                	<button type="submit" class="btn btn-info">Accept</button>
                               
                            </form>
                        </div>              
                           
                        <div class="col-lg-2 col-md-2"
                         style="padding-left: 2px;"> 
                            <form  method="post" action="fdeclinerequest.php">
                                
                                    <input type="hidden" name="sid" value="<?php echo  $sid;?>" class="form-control">
                                
                                	<button type="submit" class="btn btn-danger">Decline</button>
                                
                            </form>
                        </div>
                         
                                    
            </div>
            <br>
                    <?php    
                    }

				}
			}
			else
			{
			?>
				<div class="row">
					<div class="col-lg-4 col-md-2">
						<div class="alert alert-danger">
                            No Request Received
                                            
						</div>
					</div>
				</div>
                            
            <?php    
			}
			?>
                    
        

    </div>
<?php
}
else
    {
        header('Location:index.html');
    }
?>
</body>
</html>