<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cipher chatzy</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
            <div class="col-lg-12">
                <h1 class="page-header">Friends</h1>
            </div> 
        </div>
        
                        <?php
                        $qr="select * from partner where accept=1 and (sid='$user' or rid='$user') ";
                        $result=mysqli_query($con,$qr);
                        if(mysqli_num_rows($result)>0)
                        {
                        ?>
                            
                            <?php
							while($row=mysqli_fetch_assoc($result))
							{
							?>                                   
							<?php

							$rid=$row['rid'];
							$qr1="";
								if($row['rid']==$user)
								{
									$n=$row['sid'];
									$qr1="select * from register where email='$n'";
								}
								else
								{
									$qr1="select * from register where email='$rid'";
								}
				// echo "<script>console.log( 'qr1: " . $qr1 . "' );</script>";
									$result1=mysqli_query($con,$qr1);				
									$row1=mysqli_fetch_assoc($result1);
                                            
							?>
                                        
							<div class="row">
							<div class="col-md-1 col-lg-1">
									<img src="<?php echo ($row1['img']);?>" class="img-rounded img-responsive" alt="user" width="80" height="80">
                            </div>

                            <div class="col-md-3 col-lg-3 ">
                            	<p class="text-primary 	text-capitalize lead">
                                <?php echo ucwords($row1['name']); ?>
                           		</p>
                           		<p style="margin-top:-25px;">
                           			<?php
								echo $row1['city'].",".$row1['country'];
									?> 
                           		</p>
                           	</div>

                            <div class="col-md-1 col-lg-1">
                                    <button type="button" class="btn btn-success">Friends</button>
                            </div>
                        </div><br>
						
							 
								 
							

                                        <?php
                                        }
                                        ?>
                                

                        <?php                
                        }
                        else
                        {
                            ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="alert alert-danger">
                                    <strong>!!! Connect To Friends</strong>
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