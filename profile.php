<?php
    // include 'layout1.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	
  include 'layout1.php';
if(isset($_SESSION['email']))
{
?>
	<div id="page-wrapper" style="overflow: hidden;">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">USER PROFILE</h1>
			</div>
		</div>

		<div class="row">

			<div class="col-lg-4">
      
				
				<img src="<?php echo $row['img']; ?>" class="img-thumbnail img-responsive profile_img" width="300">
				<span class="glyphicon glyphicon-remove-sign">                              
				</span>
				
			</div>
			<div class="col-lg-8">			
				<div class="col-lg-12" id="tab1" style="z-index: 1">
  					<div class="row">
  						<div class="col-lg-2">
  							<img src="assets/img/user111.png" class="img img-responsive" width="70">
							<Span style="    float: left;position: absolute;bottom: 4px;left: 95px;"><b>ABOUT</b></Span>
  						</div>
  						
  						
  						<div style="padding-top: 10px" class="col-lg-10 text-right" >

                <button type="button" class="btn btn-info save" style="display: none";>
                  <i class="fa fa-edit fa-fw"></i>
                  Save
                </button>
  							<button  type="button" class="btn btn-warning edit">
  								<i class="fa fa-edit fa-fw"></i>
  								Edit
  							</button>
  						</div>
  					</div>

  					
  					

  				</div>
  				
  				<div id="tabs">
				  <ul>
    				<li><a href="#tabs-1">Profile</a></li>
    				<li><a href="#tabs-2">About</a></li>   
            <li><a href="#tabs-3">Photo</a></li>   
  				</ul>
  				<div id="tabs-1">    				
    				<table class="table table-responsive">
  						<tbody>
  							<tr>
  								<td>First Name</td>
  								<td><div class="fname"><?=$f?></div></td>
  							
  							
  								<td>Last Name</td>
  								<td><div class="fname"><?=$l?></div></td>
  							</tr>
  							<tr>
  								<td>User name:</td>
  								<td><?=$f?></td>
  							
  								<td>Email:</td>
  								<td><?=$user?></td>
  							</tr>
  							<tr>
  								<td>City:</td>
  								<td><div class="fname"><?=$city?></div></td>
  							  					
  								<td>Country:</td>
  								<td><div class="fname"><?=$country?></div></td>
  							</tr>
  							<tr>
  								<td>Birthday:</td>
  								<td><?=$birthday?></td>
  							  							
  								<td>Phone:</td>
  								<td><div class="fname"><?=$phone?></div></td>
  							</tr>
  						</tbody>
  					</table>   
  				</div>


  				<div id="tabs-2">
  					<div class="row">
  						<div class="col-lg-10">
  							<h3>Intro</h3>	
  						</div>
  						<div class="col-lg-1">
  							<button class="btn btn-sm btn-warning edit_about">
  								<span class="glyphicon glyphicon-pencil">
  								</span>
  								edit
  							</button>
  						</div>
  						
  						
  					</div>
  				
    			<p class="abt">
    			<?php
    			$qr5="select * from status_user where email='$user'";
    				$result5=mysqli_query($con,$qr5);
    				$row5=mysqli_fetch_assoc($result5);
    				echo $row5['about'];
    				?>
    			</p>
  				</div>

          <div id="tabs-3">
            <div class="row">
              <div style="padding-top: 10px" class="col-lg-10 text-right" >
                <button  type="button" class="btn btn-warning fupload">
                  <i class="fa fa-edit fa-fw"></i>
                  Upload photos
                </button>
              </div>
              <br>
              <div class="hs">            
                <form action="upload.php" class="upload-photo" id="upload-photo11"  method="post"
                 enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="hidden" name="tie" id="tie" value="picture">
                <button type="submit"  name="submit" class="subm">Upload Image</button>
                </form>
              </div>
            </div>

            
              <?php

                $qwr="select * from picture_upload where email='$user'
                 and typee='picture'";
                $resultw=mysqli_query($con,$qwr);
                if(mysqli_num_rows($resultw)>0)
                {
                        echo "<div class='row'>";
                  
                  while ($roww=mysqli_fetch_assoc($resultw))
                  {
                    
                    ?>
                          
                          <?php
                            
                            $sr=$roww['path'];
                            
                           
                            ?>   
                            
                            <div class="col-md-4">
                              <div class="thumbnail">  
                                <div class="del">
                                    <span class="glyphicon glyphicon-remove-sign">
                                        <img src="<?php echo($sr); ?>" alt="Nature"
                                          width="400px" height="400px"
                                           class="img-responsive">
                                    </span>
                                      <input type="hidden" name="del1"
                                       value="<?php echo($sr); ?>" 
                                       class="del2"> 
                                </div>
                              </div>
                            </div>                         
                     <?php               
                  }
                      echo "</div>";
                  
                }
                else
                {
                  ?>
                  <div class="row">
                    <div class="col-lg-4">
                        <div class="alert alert-info">
                            NO PHOTOS
                        </div>
                    </div>
                  </div>
                  
                    
                  
                  <?php
                  
                }
              ?>
            
            
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <script>
    $(".del").click(function()
    {
      var path1 = $(this).find(".del2").val();
    	
    	console.log("path",path1);


    	$.ajax(
        {
            url: 'delete_img.php',
            type: 'post',
            data: {data:path1},
            success: function (data)
            {
              location.reload();
              console.log(data);
            }
          });
    });
    $(".profile_img").click(function()
    {
        $(".hs").toggle();
        var x=document.getElementById("upload-photo11").action = "profile_pic.php";
        console.log(x);

        
        
        

          
        

    });

  $( function()
  {
    $( "#tabs" ).tabs();
  } );

  $(".hs").hide();
  
  $(".fupload").click(function()
  {
      var x=document.getElementById("upload-photo11").action = "upload.php";
     $(".hs").toggle();
     

  });

  	$(".edit_about").click(function()
  	{
  		// $(".edit_about").hide();
  		$(".edit_about").attr("disabled","disabled");
  		var abt1=$(".abt").text();
  		// console.log("abt1",abt1);
  		$(".abt").html('');
  		$(".abt").append('<textarea class="form-control abt_textarea" rows="5" id="about_textarea" >'+abt1+'</textarea>');


  		$(".abt").append('<button  type="button" class="btn btn-info btn-md abt_save">  								<span class="glyphicon glyphicon-ok">  								Save Changes  							</button>');
  		$(".abt").append('<button  type="button" class="btn btn-default btn-md abt_cancle">  								<span class="glyphicon glyphicon-remove">  								Cancle  							</button>');

  		$(".abt_cancle").click(function()
  		{
  			$(".abt").html('');
            $(".abt").append(abt1);
            $(".edit_about").removeAttr("disabled");
  		});
  		$(".abt_save").click(function()
  		{
  			
  			var abt_t=$('textarea#about_textarea').val();
  			// console.log("abt_t",abt_t);
  			var alldata=[];
  			alldata.push(abt_t);
  			$.ajax({
            url: 'about_textarea.php',
            type: 'post',
            data: {data:alldata},
            success: function (data)
            {
              // console.log(data);
              if(data=='yes')
              {
              	$(".abt").html('');
              	$(".abt").append(abt_t);
              	console.log('yes');
              }
              else
              {
              	console.log(data);
              }
              $(".edit_about").removeAttr("disabled");
            }
          	});



  			
  		});

  	});

    $(".edit").click(function()
    {
      $(this).attr("disabled","disabled");
      $(".save").show();
      console.log("ok");
      $(".fname").each(function(){

          var  a=$(this).text();
          
          $(this).html('');
          $(this).append('<input type="text" class="myinput" name="data[]" value="'+a+'">');
      });
      var alldata=[];
      $(".save").click(function(){
        $(this).hide();
        $(".edit").removeAttr("disabled");
        $(".fname input").each(function(){

          var ad=$(this).val();
          alldata.push(ad);
         // console.log(ad);
          $(this).parent(".fname").text(ad);
          $(this).remove();
        });
       // console.log(alldata);
        $.ajax({
            url: 'upprofile.php',
            type: 'post',
            data: {data:alldata},
            success: function (data) {
              location.reload();
            }
          });
      });
     
        

    });


  </script>
</body>
</html>