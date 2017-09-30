<?php
    // session_start();
    require_once('connect.php'); 
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
<body>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(isset($_SESSION['email']))
{
        $user=$_SESSION['email'];	       
	    $pass=$_SESSION['pass'];
       // echo "<script>console.log('Debug user pass:".$pass."' );
       //  </script>";
	$qr="select * from register where email='$user' and pass='$pass'";
	$result=mysqli_query($con,$qr);
	$row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    // echo "<script>console.log('Debug Objects:".$name."' );
    //     </script>";
    $city=$row['city'];
    $country=$row['country'];
    $birthday=$row['birthday'];
    $phone=$row['phone'];
    $parts=explode(" ",$name);
    $l=array_pop($parts);
    $f=implode(" ", $parts);
    
?>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home1.php">
                    <img src="assets/img/cipher.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown showmessage">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-danger">3</span><i class="fa fa-envelope fa-3x"></i>
                    </a>
                    </li>
                    
                    <!-- dropdown-messages -->
                    <ul class="dropdown-menu dropdown-messages d_top_3">                    	
                        <!-- <li>
                            <a href="#">
                                <div>
                                    <strong><span class=" label label-danger">Andrew Smith</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong><span class=" label label-info">Jonney Depp</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong><span class=" label label-success">Jonney Depp</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="message.php">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li> -->
                    </ul>
                    <!-- end dropdown-messages -->
                </li>

                

                <li class="dropdown show_notification">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts top_noti">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i>3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i>Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i>New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i>Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown show_logout">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user lgout">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation"  style="position: fixed;">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">                            
                                <img src="<?php echo $row['img']; ?>" alt="" id="imgclick">
                                
                            </div>
                            <div class="user-info">
                                <div>
                                    <?php echo ucfirst($f); ?>
                                    <strong>
                                        <?php echo ucfirst($l); ?>
                                    </strong>
                                </div>
                                <div class="user-text-online">
                                    <span id="999" class="user-circle-online
                                     btn btn-success btn-circle user_online "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    
                    <li class="selected">
                        <a href="home1.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>                
                    <!-- <li>
                        <a href="timeline.php"><i class="fa fa-flask fa-fw"></i>Event</a>
                    </li> -->

                    <li>                    	
                        <a href="#myModal1" class="get-value1" data-toggle="modal" data target="#myModal1">
                        	<i class="fa fa-user fa-fw"></i>
                        	Random chat
                        </a>
                    </li> 
                    
                    <li>
                        <a href="message.php"><i class="fa fa-flask fa-fw"></i>Message</a>
                    </li>
                    <li>
                        <a href="friend.php"><i class="fa fa-child fa-fw"></i>Friend</a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-user fa-fw"></i>Profile</a>
                    </li>    
                    <li>
                        <a href="frequest.php"><i class="fa fa-user fa-fw"></i>Friend Request</a>
                    </li>  
                     
                                                      
                    
                    <li>
                        <a href="people.php"><i class="fa fa-user fa-fw"></i>People</a>
                    </li>  
                                    
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
    </div>


<div class="container"> 
  <!-- Modal -->
  <!-- data-backdrop="static" data-keyboard="false"  -->
  <!-- use this modal to prevent it from closing by outside -->
    <div class="modal " id="myModal1" role="dialog"  aria-hidden="false"  >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background: transparent;border: 0px;box-shadow: 0px 0px 0px">
                

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
                                <ul class="dropdown-menu slidedown layout layoooo" style="top: 20px;left: -136px;">
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
                                    <a href="#"  data-dismiss="modal">
                                        <i class="fa fa-clock-o fa-fw"></i>Away
                                    </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    
                        <!--chat example-->
                        <div class="panel-body">
                            <ul class="chat">
                            
                                    <!--    <li class="left clearfix">
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
                            <form action="ajmsg.php" method="POST"
                             class="my_form1">
                            <div class="input-group form-group">
                                <input type="text" name="msg" id="btn-input" class="form-control input-sm msg1" placeholder="enter your message..." required="">
                                <input type="hidden" name="rid" id="btn-input111" value=""
                                 class="form-control input-sm rid_msg">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-warning btn-sm signup_random" id="btn-chat1">
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
            
        echo "<script>window.location.href='index.html'</script>";
    }
    ?>



            <!-- time ago jquery -->
            <script src="jquery.min.js" type="text/javascript"></script>
            <script src="jquery.timeago.js" type="text/javascript"></script>
            <!-- time ago jquery -->

  
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
  <!--   <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script> -->
<!--     <script src="assets/plugins/morris/morris.js"></script>
 -->   <!--  <script src="assets/scripts/dashboard-demo.js"></script> -->
<script>
$(document).ready(function()
{

	
	$('form.my_form1').submit(function(event)
		{
    		event.preventDefault(); // Prevent the form from submitting via the browser
            var nameValue = document.getElementById("btn-input111").value;
            console.log("input in form_my_form layout1",nameValue);
    		$(".signup_random").attr("disabled","disabled");
     		$(".signup_random").text("sending...");
    		var form = $(this);
    		$.ajax({
      		type: form.attr('method'),
      		url: form.attr('action'),
      		data: form.serialize()
    		}).done(function(data) {
      		
      		var alldata_layout=JSON.parse(data);
            console.log("layout",alldata_layout);
       		$(".signup_random").removeAttr("disabled");
       		var a='<li class="right clearfix">                                    <span class="chat-img pull-right">                                        <img src="'+alldata_layout['img']+'" width="50px" height="60px" alt="User Avatar" class="img-circle">                                    </span>                                    <div class="chat-body clearfix">                                        <div class="header">                                            <small class=" text-muted">                                                <i class="fa fa-clock-o fa-fw"></i>13 mins ago</small>                                            <strong class="pull-right primary-font">'+alldata_layout['user']+'</strong>                                        </div>                                        <p class="text-right" style="font-size: 12px;">                                       '+alldata_layout['msg']+'  </p>                                    </div>                            </li>';
       		$(".chat").append(a);
        	$(".signup_random").text("send");
    		}).fail(function(data)
            {
      		    $(".signup_random").removeAttr("disabled");
        	   $(".signup_random").text("send");
      		    alert("Network Error");
    		});
  		});



	$(".showmessage").click(function(){
		$(".d_top_3").toggle(300);
	});

	$(".show_notification").click(function()
	{
		$(".top_noti").toggle(300);
	});

	$(".show_logout").click(function()
	{
		$(".lgout").toggle(300);
	});



	$(".get-value1").click(function()
	{
        // document.getElementById("btn-input111").
        //                 setAttribute('value',result2[key]['rid']);
        //                 var e1=document.getElementById("btn-input111").getAttribute("value");
        //                 console.log("rid in form ajax",e1);

		var alldata='<?php echo $user; ?>';
		  // console.log("alldata",alldata);
		$.ajax({
            url: 'random_chat.php',
            type: 'post',
            data: {data:alldata},
            success: function (data)
            {
            	// console.log(data);
            	var result2=JSON.parse(data);

            	// console.log("result",result2);
            	var all='';
            	for(var key in result2)
        		{
        			if(result2[key]['no message']=='no message')
        			{
                        document.getElementById("btn-input111").
                        setAttribute('value',result2[key]['rid']);
                        var e1=document.getElementById("btn-input111").getAttribute("value");
                        // console.log("rid in form ajax",e1);
        				// console.log("no mess");
        				// all+='no message';
        				
        			}
        			else if(result2[key]['rid']==alldata)
        			{
        				document.getElementById("btn-input111").
                        setAttribute('value',result2[key]['sid']);
                        var e1=document.getElementById("btn-input111").getAttribute("value");
                        // console.log("rid in form ajax",e1);
        				all+='<li class="left clearfix">                                    		<span class="chat-img pull-left">                                        		<img src="'+result2[key]['img']+'"       				   alt="User Avatar" class="img-circle" width="50px" height="60px">                                    		</span>                                    		<div class="chat-body clearfix">                                        		<div class="header">                                            		<strong class="primary-font">'+result2[key]['name']+'</strong>                                            		<small class="pull-right text-muted">                                                		<i class="fa fa-clock-o fa-fw"></i>12 mins ago                                            		</small>                                      		</div>                                        		<p style="font-size: 12px;">                                            		'+result2[key]['msg']+ '</p>                                    		</div>                            			</li>';
        			}
        			else
        			{
                        document.getElementById("btn-input111").
                        setAttribute('value',result2[key]['rid']);
                        var e1=document.getElementById("btn-input111").getAttribute("value");
                        // console.log("sid in form ajax",e1);
        				all+='<li class="right clearfix">                                    		<span class="chat-img pull-right">                                        		<img src="'+result2[key]['img']+'" alt="User Avatar" class="img-circle" width="50px" height="60px">                                    		</span>                                    		<div class="chat-body clearfix">                                        		<div class="header">                                            		<small class=" text-muted">                                                		<i class="fa fa-clock-o fa-fw"></i>13 mins ago                                                	</small>                                            		<strong class="pull-right primary-font">'+result2[key]['name']+'</strong>                                        		</div>                                        		<p class="text-right" style="    font-size: 12px;">                                            		'+result2[key]['msg']+ '                                       		</p>                                    		</div>                            			</li>';
        			}
        		}
                var e11=document.getElementById("btn-input111").getAttribute("value");
                console.log("after for in layout1",e11);
                                    
        		$(".chat").html(all);
            	
            }
          });		
	});

	var user1='<?php echo $user; ?>';
	var status_data=[];
	status_data.push(user1);

	$.ajax({
			url: 'status_select.php',
            type: 'post',
            data: {data:status_data},
            success: function (data)
            {
            	console.log(data);
            	if(data=='online')
            	{
            	$("#999").removeClass("btn-success btn-danger").
            	addClass("btn-success");
            	}
            	else
            	{
            		$("#999").removeClass("btn-success btn-danger").
            		addClass("btn-danger");
            	}
            }
        });
	$(".user_online").click(function()
	{
		$.ajax({
			url: 'status.php',
            type: 'post',
            data: {data:status_data},
            success: function (data)
            {
            	
            	// var json_status=JSON.parse(data);
            	console.log("status.php",data);
            	if(data=='online to offline')
            	{
            		console.log("if",data);
            	$("#999").removeClass("btn-success").addClass("btn-danger");
            	}
            	else if(data=='offline to online')
            	{
            		console.log("else if",data);
            	$("#999").removeClass("btn-danger").addClass("btn-success");
            	}
            	else
            	{
            		console.log("else",data);
            	}
            }
          });
	});
	//console.log(user1);
	


	$.ajax({
            url: 'top_3_msg.php',
            type: 'post',
            data: {data:user1},
            success: function (data)
            {
            	var result2=JSON.parse(data);
            	// console.log(data);
              // location.reload();
              // console.log(result2);
              var all='';
              for(var key in result2)
              {
              		if(result2[key]['no message']=='no message')
              		{
              			// console.log('no message in top_3');
              			all+='<li>                            <a class="top3_label_info" href="#">                                <div>                                    <strong><span class=" label label-info">'+result2[key]['no message']+'</span></strong>                                    <span class="pull-right text-muted">                                        <em></em>                                    </span>                                </div>                                <div></div>                            </a>                        </li>';
              		}
              		else
              		{
              			// console.log('record avail in top_3');
              			all+='<li>                            <a class="top3_label_info" href="#">                                <div>                                    <strong><span class=" label label-info">'+result2[key]['name']+'</span></strong>                                    <span class="pull-right text-muted">                                        <em>Yesterday</em>                                    </span>                                </div>                                <div>'+result2[key]['msg']+'</div>                            </a>                        </li>';
              		}
              }
              // console.log('ff',all);
              $(".d_top_3").html(all);


            }
          });
	$(".top3_label_info").click(function()
	{
		console.log("lableinfo");
	});
});
</script>
</body>

</html>
