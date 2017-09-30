<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cipher Chatzy</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />
     <!-- Page Level CSS -->
    <link href="assets/plugins/timeline/timeline.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>

<?php

	include 'layout1.php';
	// include 'connect.php';
if(isset($_SESSION['email']))
{    
?>
<div id="page-wrapper">

	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">People on Cipher</h1>
        </div>
        <!--End Page Header -->
    </div>
<?php
	$qr="select * from register where email!='$user'";
	$result=mysqli_query($con,$qr);
	if(mysqli_num_rows($result)>0)
	{
		
		while($row=mysqli_fetch_assoc($result))
		{
			$rid=$row['email'];
			$qr2="select * from status_user where email='$rid'";
			$result2=mysqli_query($con,$qr2);
			$row2=mysqli_fetch_assoc($result2);
		?>
			
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-md-1 col-lg-1">
									<img src="<?php echo ($row['img']);?>" class="img-rounded img-responsive" alt="user" width="80" height="80">
                </div>
				<div class="col-lg-2 col-md-2">
					
					<?php
					echo "<p class='text-primary 	text-capitalize lead'>".ucwords($row['name'])."</p>";
					echo "<p style='margin-top:-25px;'>".$row['city'].",".$row['country']."</p>";
					// echo "<p>".$row2['about']."</p>";
					?>
					
				</div>

				
		<?php
		
					
					
		$qr1="select * from partner where rid='$rid' and sid='$user'";
		$result1=mysqli_query($con,$qr1);
			if(mysqli_num_rows($result1)>0)
			{
                        
						$row1=mysqli_fetch_assoc($result1);
						$accept=$row1['accept'];
						if($accept==1)
						{
						?>
							<div class="col-lg-1 col-md-1">
								<button type="button" class="btn btn-sm btn-success">
									<span class="glyphicon glyphicon-ok">
									</span>
									Friends
								</button>
							 </div>
						

						<?php
						}
						else
						{
							echo "<div class='col-lg-2 col-md-2'>";
							echo "<button type='button' class='btn btn-info btn-sm'>
							<span class='glyphicon glyphicon-ok'>
							</span>
									Request send
								</button>";
							echo "</div>";
						}
					   
						
						
			}
			else
			{
			?>
					
					   <form  method="post" action="friendrequest.php">
					   
						  <input type="hidden" name="rid" 
						  value="<?php echo  $row['email'];?>" class="form-control">
					   <!-- <div class="form-group"> -->
					   		<div class="col-lg-1 col-md-1">
					   		<button type="submit" class="btn btn-info btn-sm">	
                                <span class="glyphicon glyphicon-user">		       Partner
                                </span>
					   		</button>	 
					   		</div>
						<!-- </div> -->
                       </form>			
					
					
			<?php 
			}
			?>
						<div class="col-lg-1">
						<!-- <form  method="post" action="friendrequest.php"> -->
						<!-- <div class="form-group"> -->
							<!-- <input type="hidden" name="rid" value="" class="form-control"> -->
						<!-- </div> -->
							<button type="button" class="btn btn-success btn-sm get-value" data-toggle="modal" data-target="#myModal" data-id="<?php echo  $row['email'];?>">
                                <span class="glyphicon glyphicon-envelope">
							         Message
                                </span>
							</button>					
						<!-- </form> -->
						</div>			
				
				</div>
				<br>
				<!-- <div class="row"> -->
					
										
			<?php			
		}
		
	}
	else
	{
		echo "<div class='alert alert-info'><strong>NO people</strong></div>";
	}
?>
	

		

</div>


<!-- Modal -->
  <!-- data-backdrop="static" data-keyboard="false" -->
  <!-- use this modal to prevent it from closing by outside -->
<div class="container">   
	<div class="modal " id="myModal" role="dialog"  aria-hidden="false">
		<div class="modal-dialog modal-lg">
    		<div class="modal-content"  style="background: transparent;border: 0;  box-shadow: 0px 0px 0px;">
        		

        		<div class="modal-body" style="background: transparent;">
        		<div class="row">
          		<div class="col-lg-6">
                	<div class="chat-panel panel panel-primary">

                    	<!--panel heading-->
                    	<div class="panel-heading">
	                        <i class="fa fa-comments fa-fw"></i>
                        	chat
                        	<div class="btn-group pull-right">
	                            <button type="button" class="btn btn-default btn-xs dropdown-toggle dropdowna" data-toggle="dropdown">
    	                            <i class="fa fa-chevron-down"></i>
        	                    </button>
                                </div>
                                <div>
            	                <ul class="dropdown-menu slidedown"
                                 style="display: block; position: absolute;
                                 left: 255px;top: 36px;">
                	                <li>
                    	                <a href="#">
                        	                <i class="fa fa-check-circle fa-fw"></i>Available
                            	        </a>
                                	</li>
                                	<li>
                                    <a href="#">
                                        <i class="fa fa-times"></i>Busy
                                    </a>
                                	</li>
                                	<li>
                                    <!-- <a href="#" class="close" data-dismiss="modal">-->
                                    	<a href="#" class="hello"                                 	 	data-dismiss="modal"> 
                                        <i class="fa fa-clock-o fa-fw"></i>Away
                                    	</a>
                                	</li>
                            	</ul>
                        	</div>
                    	</div>

                    
                    	<!--chat example-->
                    	<div class="panel-body">
                        	<ul class="chat">
                        	
                            		<!-- 	<li class="left clearfix">
                                    		<span class="chat-img pull-left">
                                        		<img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle">
                                    		</span>
                                    		<div class="chat-body clearfix">
                                        		<div class="header">
                                            		<strong class="primary-font">Jack</strong>
                                            		<small class="pull-right text-muted">
                                                		<i class="fa fa-clock-o fa-fw"></i>12 mins ago
                                            		</small>
                                        		</div>
                                        		<p>
                                            		chat
                                        		</p>
                                    		</div>
                            			</li>

                            			
                            
                            			<li class="right clearfix">
                                    		<span class="chat-img pull-right">
                                        		<img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle">
                                    		</span>
                                    		<div class="chat-body clearfix">
                                        		<div class="header">
                                            		<small class=" text-muted">
                                                		<i class="fa fa-clock-o fa-fw"></i>13 mins ago
                                                	</small>
                                            		<strong class="pull-right primary-font">sparrow</strong>
                                        		</div>
                                        		<p>
                                            		chat
                                        		</p>
                                    		</div>
                            			</li>
 -->
                            
                            	<!-- <li class="right clearfix">
                                    		<span class="chat-img pull-right">
                                        		<img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle">
                                    		</span>
                                    		<div class="chat-body clearfix">
                                        		<div class="header">
                                            		<small class=" text-muted">
                                                		<i class="fa fa-clock-o fa-fw"></i>Since friends
                                                	</small>
                                            		<strong class="pull-right primary-font">No messages</strong>
                                        		</div>
                                        		<p>
                                            		no messages
                                        		</p>
                                    		</div>
                            			</li> -->
                            
                        	</ul>
                    	</div>

                    	<div class="panel-footer">
                        	<form action="ajmsg.php" method="POST" class="my_form">
                        	<div class="input-group form-group">
	                            <input type="text" name="msg" id="btn-input" class="form-control input-sm msg1" placeholder="enter your message..." required="">
	                            <input type="hidden" name="rid"
                                 id="btn-input11" value=""
                                 class="form-control input-sm rid_msg">
    	                        <span class="input-group-btn">
        	                        <button type="submit" class="btn btn-warning btn-sm signup" id="btn-chat">
            	                        Send
                	                </button>
                    	        </span>
                        	</div>
                        	</form>
                    	</div>
                	</div>
            	</div>
            	</div>
        		</div>

        		

    		</div>
    	</div>
  	</div>
</div>
<?php
}
    else
    {
        header('Location:index.html');
    }
?>
<script>
	$(document).ready(function()
	{
		$('form.my_form').submit(function(event)
		{
            var nameValue = document.getElementById("btn-input11").value;
            // console.log("input in people",nameValue);
    		event.preventDefault();
             // Prevent the form from submitting via the browser
            // var x=document.forms["my_form"]["rid"].value;
            // console.log("rid in my_form",x);
        
    		$(".signup").attr("disabled","disabled");
     		$(".signup").text("sending...");
    		var form = $(this);
    		$.ajax({
      		type: form.attr('method'),
      		url: form.attr('action'),
      		data: form.serialize()
    		}).done(function(data)
            {
      		    console.log(data);
      		var alldata=JSON.parse(data);
            // console.log("Dta",alldata);
       		$(".signup").removeAttr("disabled");
       		var a='<li class="right clearfix">                                    <span class="chat-img pull-right">                                        <img src="'+alldata['img']+'" height="60px" width="50px" alt="User Avatar" class="img-circle">                                    </span>                                    <div class="chat-body clearfix">                                        <div class="header">                                            <small class=" text-muted">                                                <i class="fa fa-clock-o fa-fw"></i>13 mins ago</small>                                            <strong class="pull-right primary-font">'+alldata['user']+'</strong>                                        </div>                                        <p class="text-right" style="font-size: 12px;">                                       '+alldata['msg']+'  </p>                                    </div>                            </li>';
       		$(".chat").append(a);
        	$(".signup").text("send");
    		}).fail(function(data)
            {
      		    $(".signup").removeAttr("disabled");
        	   $(".signup").text("send");
      		    alert("Network Error");
    		});
  		});



		$(".get-value").click(function()
		{
			var rid=$(this).attr('data-id');
			var sid='<?php echo $user; ?>';
			// console.log("rid in people",rid);
			document.getElementById("btn-input11").setAttribute('value',rid);
		var e1=document.getElementById("btn-input11").getAttribute("value");
			// console.log("hello rid in people:",e1);
			$.ajax({url: "chat_popup.php?rid="+rid+"&sid=<?=$user?>", success: function(result)
			{
        				
        				// console.log(JSON.parse(result));
        				var result2=JSON.parse(result);
        				var all='';
        				for(var key in result2)
        				{
        					if(result2[key]['no message']=='no message')
        					{
        						// all+='no message';
        						// console.log("no message");
        					}        					          			
        					else if(result2[key]['rid']==sid)
        					{
        					 	all+='<li class="left clearfix">                                    		<span class="chat-img pull-left">                                        		<img src="'+result2[key]['img']+'" height="60px" width="50px" alt="User Avatar" class="img-circle">                                    		</span>                                    		<div class="chat-body clearfix">                                        		<div class="header">                                            		<strong class="primary-font">'+result2[key]['name']+'</strong>                                            		<small class="pull-right text-muted">                                                		<i class="fa fa-clock-o fa-fw"></i>12 mins ago                                            		</small>                                      		</div>                                        		<p style="font-size: 12px;">                                            		'+result2[key]['msg']+ '</p>                                    		</div>                            			</li>';
        					}
        					else
        					{
        						all+='<li class="right clearfix">                                    		<span class="chat-img pull-right">                                        		<img src="'+result2[key]['img']+'" height="60px" width="50px" alt="User Avatar" class="img-circle">                                    		</span>                                    		<div class="chat-body clearfix">                                        		<div class="header">                                            		<small class=" text-muted">                                                		<i class="fa fa-clock-o fa-fw"></i>13 mins ago                                                	</small>                                            		<strong class="pull-right primary-font">'+result2[key]['name']+'</strong>                                        		</div>                                        		<p class="text-right" style="    font-size: 12px;">                                            		'+result2[key]['msg']+ '                                       		</p>                                    		</div>                            			</li>';
        					}

        			    }
                //         var e11=document.getElementById("btn-input11").getAttribute("value");
                // console.log("after for in people",e11);
                        
        				$(".chat").html(all);
   			}});
		});
		$(document).on("click",".dropdowna",function(){
			$(".slidedown").toggle(100);
		})
	});
</script>

</body>
</html>