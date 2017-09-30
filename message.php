<?php 
    // include 'layout1.php';
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
    <link href="css/style1.css" rel='stylesheet' type='text/css' />
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>






<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="js/d3.v3.js">
    
</script>
<script src="js/rickshaw.js"></script>

   </head>
<body>
<?php
    

session_start();
include 'layout1.php';
    // echo ("<script>console.log( '$user' );</script>");
if(isset($_SESSION['email']))
{    
    
    

    ?>

    <div id="page-wrapper">
        <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Messages</h1>
                </div>
                <!--End Page Header -->
        </div>
        <div class="row">    
        <div class="col-lg-5">
        <div class="panel-body">
        
            
            <?php
                    $qre="select * from recent_chat where (sid='$user') or (rid='$user')";
                    $rresult=mysqli_query($con,$qre);
                    $no=mysqli_num_rows($rresult);
                    echo ("<script>console.log( 'no$no' );</script>");
                    if(mysqli_num_rows($rresult)>0)
                    {
                        while($rowee=mysqli_fetch_assoc($rresult))
                        {
                            
                            // echo "<script>console.log( 'Debug Objects: " . $rowee['sid']. "' );</script>";
                            $riddee=$rowee['rid'];
                            $sdee='';
                            if($riddee==$user)
                            {   
                                $id_msg=$rowee['sid'];
                                $sdee=$id_msg;
                                $qwer="select * from register where email='$id_msg'";
                            }
                            else
                            {
                                $sdee=$riddee;
                                $qwer="select * from register where email='$riddee'";
                            }
                            
                            $rresult1=mysqli_query($con,$qwer);
                            $roee=mysqli_fetch_assoc($rresult1);
                            ?>
                            <div class="m1" data-toggle="modal"
                             data-target="#myModal_message">       
                            <div class="row">
                                <!-- Welcome -->
                                <div class="col-lg-12">
                                    <input type="hidden" name="em" class="em1" value="<?php echo $sdee; ?>">
                                    <div class="alert alert-info">
                                    <span class="chat-img pull-left">
                                        <img src="<?php echo $roee['img'];?>" id="ddd"
                                         alt="User Avatar" style="height: 60px;width: 60px;"
                                          class="img-circle" />
                                    </span>
                                        <div class="chat-body clearfix">
                                        <div class="header" >
                                            <strong class="primary-font">
                                                <?php
                                                 echo ucwords($roee['name']);
                                                 ?>                       
                                            </strong>
                                            <small class="pull-right text-danger">
                                                <i class="fa fa-clock-o fa-fw text-primary"></i>12 mins ago
                                            </small>
                                        </div>
                                        <p style="color: black">
                                            <?php echo $rowee['msg'];?>                       
                                        </p>
                                    </div>
                        
                                    </div>
                                </div>
                                <!--end  Welcome -->
                            </div>
                            </div>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <div class="row">
                        <div class="col-lg-8 alert alert-info">
                            <strong>No Messages</strong>
                        </div>
                        </div>
                        <?php
                    }

            ?>
                            
                            
                        
        
        </div>
        </div>
        </div>
                <!--End Page Header -->
        

		


    </div>
    <!-- Modal -->
  <!-- data-backdrop="static" data-keyboard="false" -->
  <!-- use this modal to prevent it from closing by outside -->
<div class="container"> 
	<div class="modal " id="myModal_message" role="dialog"  aria-hidden="false"  >
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
                                    style="position: absolute;
                                    left: 210px;top: 41px;">            	                
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
                                    	<a href="#"                                  	 	data-dismiss="modal"> 
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
	                            <input type="hidden" name="rid" id="btn-input11" value=""
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
	// $(".m1").click(function()
	// {
	// 	console.log("inside");
	// 	$('#myModal').modal();
	// });
    $('form.my_form').submit(function(event)
        {
            event.preventDefault(); // Prevent the form from submitting via the browser

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
            console.log(alldata);
            $(".signup").removeAttr("disabled");
            var a='<li class="right clearfix">                                    <span class="chat-img pull-right">                                        <img src="'+alldata['img']+'" width="50px" height="60px" alt="User Avatar" class="img-circle">                                    </span>                                    <div class="chat-body clearfix">                                        <div class="header">                                            <small class=" text-muted">                                                <i class="fa fa-clock-o fa-fw"></i>13 mins ago</small>                                            <strong class="pull-right primary-font">'+alldata['user']+'</strong>                                        </div>                                        <p class="text-right" style="font-size: 12px;">                                       '+alldata['msg']+'  </p>                                    </div>                            </li>';
            $(".chat").append(a);
            $(".signup").text("send");
            }).fail(function(data)
            {
                $(".signup").removeAttr("disabled");
               $(".signup").text("send");
                alert("Network Error");
            });
        });



        $(".m1").click(function(e)
        {
            //console.log($(this));
            
            var rid = $(this).find(".em1").val();
            // console.log("rissd",rid);
            document.getElementById("btn-input11").setAttribute('value',rid);
            var e1=document.getElementById("btn-input11").getAttribute("value");
            console.log("hello",e1);
            $.ajax({url: "chat_popup.php?rid="+rid+"&sid=<?=$user?>", success: function(result)
            {
                        
                        console.log(JSON.parse(result));
                        var result2=JSON.parse(result);
                        var all='';
                        for(var key in result2)
                        {
                            if(result2[key]['no message']=='no message')
                            {
                                console.log('true');
                            }                                               
                            else if(result2[key]['sid']==rid)
                            {
                                console.log('trrid');
                                all+='<li class="left clearfix">                                            <span class="chat-img pull-left">                                               <img src="'+result2[key]['img']+'" width="50px" height="60px" alt="User Avatar" class="img-circle">                                         </span>                                         <div class="chat-body clearfix">                                                <div class="header">                                                    <strong class="primary-font">'+result2[key]['name']+'</strong>                                                  <small class="pull-right text-muted">                                                       <i class="fa fa-clock-o fa-fw"></i>12 mins ago                                                  </small>                                            </div>                                              <p style="font-size: 12px;">                                                    '+result2[key]['msg']+ '</p>                                            </div>                                      </li>';
                            }
                            else
                            {
                                all+='<li class="right clearfix">                                           <span class="chat-img pull-right">                                              <img src="'+result2[key]['img']+'" width="50px" height="60px" alt="User Avatar" class="img-circle">                                         </span>                                         <div class="chat-body clearfix">                                                <div class="header">                                                    <small class=" text-muted">                                                     <i class="fa fa-clock-o fa-fw"></i>13 mins ago                                                  </small>                                                    <strong class="pull-right primary-font">'+result2[key]['name']+'</strong>                                               </div>                                              <p class="text-right" style="    font-size: 12px;">                                                 '+result2[key]['msg']+ '                                            </p>                                            </div>                                      </li>';
                            }
                        }
                        // console.log('ff',all);
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