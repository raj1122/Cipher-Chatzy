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

</head>

<body>
<?php 
    include 'layout1.php';
if(isset($_SESSION['email']))
{
?>
    <!--  wrapper -->
    <!-- <div id="wrapper">    --> 
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Timeline Page</h1>
                </div>
                <!--End Page Header -->
            </div>

               <div class="row">
                <div class="col-lg-12">
                    <!--Timeline -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i>Timeline
                        </div>						
                        <div class="panel-body">
                        	
                            <ul class="timeline t_append">
                            	<li>
                            		<form class="form-horizontal timeline_text"
                            		 action="timeline_update.php" method="post">
                        				<div class="form-group">
                        					<div class="col-lg-6 col-sm-6">
                        						<textarea class="form-control" rows="5" cols="1"
                        						 name="timeline_text">
												
                        						</textarea> 
                        					</div>
                        				</div>
                        				<input type="hidden" name="tie"
                        				 	value="timeline_txt">
                        				<div class="form-group">
                        					<div class="col-lg-1 col-sm-1">
                        						<button type="submit"  class="btn btn-info sb_submit">
                        							POST
                        						</button></form>
                        					</div>
                        					<div class="form-group">
                        					<div class="col-sm-4 col-lg-4">
                        						<form action="upload.php" class="upload-photo" id="upload-photo11"  method="post" class="form-inline" 
                 									enctype="multipart/form-data">
													<div class="form-group col-lg-8">
                 										<input type="file" name="fileToUpload"
                 									 	id="fileToUpload">
                                                        <input type="hidden" name="tie" id="tie" value="timeline">
                 									 </div>
                 									 <div class="form-group col-lg-1">
                										<button type="submit"
                										 class="btn btn-danger btn-m"
                										 name="submit" class="subm">
                										 		Upload Image
                										 </button>
                									</div>
                								</form>
                        					</div>  
                        					</div>                      				
                        				</div>
                        			
                            	</li>
                                <!-- <li>
                                    <div class="timeline-badge">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Timeline Event</h4>
                                            <p>
                                                <small class="text-muted"><i class="fa fa-time"></i>11 hours ago via Twitter</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                        </div>
                                    </div>
                                </li> -->
                                <!-- <li class="timeline-inverted">
                                    <div class="timeline-badge warning">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Timeline Event</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                        </div>
                                    </div>
                                </li> -->
                                <!-- <li>
                                    <div class="timeline-badge danger">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Timeline Event</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                        </div>
                                    </div>
                                </li> -->

                                <!-- <li>
                                    <div class="timeline-badge danger">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Picture</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <img src="uploads/1.jpg" width="100%"
                                             class="img-thumbnail">
                                        </div>
                                    </div>
                                </li> -->





                                <!-- <li class="timeline-inverted">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Timeline Event</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                        </div>
                                    </div>
                                </li> -->
                                <li>
                                    <div class="timeline-badge info">
                                        <i class="fa fa-save"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Timeline Event</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                            <hr>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cog"></i>
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Action</a>
                                                    </li>
                                                    <li><a href="#">Another action</a>
                                                    </li>
                                                    <li><a href="#">Something else here</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Timeline Event</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                        </div>
                                    </div>
                                </li> -->
                                <!-- <li class="timeline-inverted">
                                    <div class="timeline-badge success">
                                        <i class="fa fa-thumbs-up"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Timeline Event</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                        </div>
                                    </div>
                                </li> -->
                            </ul>
                        </div>

                    </div>
                    
                </div>
            </div>
            <!--End Timeline -->


        </div>
        <!-- end page-wrapper -->

    
    <!-- end wrapper -->
<?php
}
else
{
        header('Location:index.html');
}
?>
    
<Script>
$(document).ready(function()
{
    
            var sid1='<?php echo $user;?>';
            // console.log("sid:",sid1);
            $.ajax({
            url: 'timeline_ajax.php',
            type: 'post',
            data: {data:sid1},
            success: function (data)
            {
                // console.log(data);
                var alldata=JSON.parse(data);
                // console.log(alldata);
                var all='';
                for(var key in alldata)
                {
                	if(alldata[key]['typee']=='timeline_txt')
                	{
                		all+='<li>                                    <div class="timeline-badge success">                                        <i class="fa fa-check"></i>                                    </div>                                    <div class="timeline-panel">                                        <div class="timeline-heading">                                            <h4 class="timeline-title">'+alldata[key]['name']+'</h4>                                            <p>                                                <small class="text-muted"><i class="fa fa-time"></i>'+alldata[key]['date']+' hours ago via Twitter</small>                                            </p>                                        </div>                                        <div class="timeline-body">                                            <p>'+alldata[key]['path']+'.</p>                                        </div>                                    </div>                                </li>';
                 	}
                	else
                	{
                    all+='<li>                                    <div class="timeline-badge danger">                                        <i class="fa fa-credit-card"></i>                                    </div>                                    <div class="timeline-panel">                                        <div class="timeline-heading">                                            <h4 class="timeline-title">'+alldata[key]['name']+'</h4><p>                                                <small class="text-muted"><i class="fa fa-time"></i>'+alldata[key]['date']+' ago via Twitter</small>                                            </p>                                      </div>                                        <div class="timeline-body">                                            <img src="'+alldata[key]['path']+'" width="100%"                                             class="img-thumbnail">                                        </div>                                    </div>                                </li>';
                	}
                }
                // console.log(all);
                $(".t_append").append(all);
            }
        });

            $.ajax({
            url: 'timeline_ajax.php',
            type: 'post',
            data: {data:sid1},
            success: function (data)
            {
                // console.log(data);
                var alldata=JSON.parse(data);
                // console.log(alldata);
                var all='';
                for(var key in alldata)
                {
                }
            }
        });



    
    
	// console.log('timeline loaded');    
	$("form.timeline_text").submit(function(e)
	{
		event.preventDefault();
		$(".sb_submit").attr("disabled","disabled");
		$(".sb_submit").text("POSTING...");
		var form = $(this);
            $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize()
            }).done(function(data) {
            // console.log(data);
            var alldata=JSON.parse(data);
            var a='<li>                                    <div class="timeline-badge">                                        <i class="fa fa-check"></i>                                    </div>                                    <div class="timeline-panel">                                        <div class="timeline-heading">                                            <h4 class="timeline-title">'+alldata['user']+'</h4>                                            <p>                                                <small class="text-muted"><i class="fa fa-time"></i>'+alldata['date']+' ago via Twitter</small>                                            </p>                                        </div>                                        <div class="timeline-body">                                            <p>'+alldata['text']+'.</p>                                        </div>                                    </div>            </li>';
            // console.log("hh",a);
            $(".t_append").append(a);
            $(".sb_submit").removeAttr("disabled");
             $(".sb_submit").text("POST");
			}).fail(function(data)
            {
                $(".sb_submit").removeAttr("disabled");
               $(".sb_submit").text("POST");
                alert("Network Error");
            });

	});
	
});
</Script>

</body>

</html>
