<!--this code executes when the user login as seller which retreives the google information of seller and provides user to upload,update profile and view item uploaded by him-->   
<?php
    session_start();
    include('../setup.php');
    include('../Seller.php');
    $_SESSION['usertype']='seller';
    $conn = new mysqli('localhost','id1123191_nitket','id1123191_nitket','id1123191_nitket') or die('Cant Connect To server ....');
    if(!isset($_SESSION['google_data'])):header("Location:index.php");endif;    
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>-Admin Page-</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href='../http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<style>
        .navbar{background-color: black;}
        .navbar-header{background-color:black;}
        .nav li{background-color:black;}
        #details{color:white;}
        .modal{border-radius:0px !important;}
        .modal-content
        {
            background: linear-gradient(270deg, #97e6d2, #787d7c);
            background-size: 400% 400%;

            -webkit-animation: AnimationName 33s ease infinite;
            -moz-animation: AnimationName 33s ease infinite;
            animation: AnimationName 33s ease infinite;

            @-webkit-keyframes AnimationName {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @-moz-keyframes AnimationName {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @keyframes AnimationName { 
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
        }
        .panel-heading{
            border:none;
        }
        
    </style>

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="background-color:black;font-size:18px;">Google User:-<?php echo $_SESSION['google_data']['name'];?></a> 
            </div>

            <div style="color: white;
                        padding: 15px 50px 5px 50px;
                        float: right;
                        font-size: 16px;">Time Is:
            <div id="txt" style="color:white;"></div>
            <a href="../logout.php?logout" class="btn btn-danger">Logout Now</a></div>
        
        </nav>   

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li><?php echo '<img src="'.$_SESSION['google_data']['picture'].'" alt="" class="img img-responsive" width="250" height="220"';?></li>
                    <li><?php echo '<a href="'.$_SESSION['google_data']['link'].'"><i class="fa fa-google-plus text-center fa-2x" aria-hidden="true"></i>My G+Link</a>';?></li>                   
                    <li id="show_details"><a href="index.php?show_details" ><i class="fa fa-square-o fa-2x"></i>Show My Google Details</a></li>			
                    <!--google details -->
                    <div id="details">
                    <?php	
                    echo '<li><b>Name </b>:'.$_SESSION['google_data']['given_name'].'</li>';    
				    echo '<li><b>Google ID : </b>' . $_SESSION['google_data']['id'].'</li>';
				    echo '<li><b>Full Name </b>:'. $_SESSION['google_data']['name'].'</li>';
				    echo '<b>Email : </b>' . $_SESSION['google_data']['email'];
				    echo '<li><b>Gender </b>:' . $_SESSION['google_data']['gender'].'</li>';
				    echo '<li><b>Language</b> :' . $_SESSION['google_data']['locale'].'</li>';
				   
				    ?>
				    </div>
                    <!--google details -->
                    <li><a href="index.php"><i class="fa fa-square-o fa-2x"></i>Upload Item</a></li>
                    <li><a id="update" data-toggle="modal" data-target="#updateProfile"><i class="fa fa-square-o fa-2x"></i>Update Contact Number</a></li>
                    <li><a id="show_uploaded_by_me"><i class="fa fa-square-o fa-2x"></i>Items Uploaded By Me</a></li>
        
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 align="center">Welcome <?php  echo  $_SESSION['google_data']['name'];?></h2>   
                        <h5 align="center">You Have Logged in as Seller , Have a great day . </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                      
                <div class="row" >                    
                   <div class="col-md-12 col-sm-12 col-xs-12" id="show_all">
                       <?php
    
                            if(isset($_GET['uploaded']))
                            {
                               echo '<div class="alert alert-danger" id="alert_done">Item Uploaded Sucessfully</div>';    
                            } 
                            //show_upload_form();  


                        ?>
                        <div class="col col-sm-12" id="show_form">
                        	
                        	<div class="panel panel-default">
			                    <div class="panel-heading">
			                       <h5 align="center">Upload Here </h5>
			                    </div>
			                    <div class="panel-body">
			                        <form action="Seller.php" method="post" enctype="multipart/form-data">
			                            <div class="form-group">
			                                <label for="item Name">Item Name</label>
			                                <input type="text" class="form-control" name="item_name" required pattern="^[a-zA-Z0-9 ]{4,}">
			                            </div>

			                            <div class="form-group">
			                                <label for="item cat">Item Category</label>
			                                <select class="form-control" name="item_cat">
			                                    <option value="Mobile">Mobile</option>
			                                    <option value="Notepad">Notepad</option>
			                                    <option value="Laptop">Laptop</option>
			                                    <option value="Tab">Tab</option>
			                                    <option value="Book">Book</option>
			                                    <option value="Bicycle">Bicycle</option>
			                                    <option value="others">Others</option>
			                                </select>
			                            </div>

			                            <div class="form-group">
			                                <label for="price">Price</label>
			                                <input type="text" class="form-control" name="item_price"required pattern="[0-9]{2,}">
			                            </div>

			                            <div class="form-group">
			                                <label for="item_desc">Item Description</label>
			                                <input type="text" class="form-control" name="item_descp" required >
			                            </div>

			                            <div class="form-group">
			                                <label for="itemstatus"> Item Status</label>
			                                <select class="form-control" name="item_status" required>
			                                     <option>Available</option>
			                                     <option>Not Available</option>   
			                                </select>
			                                
			                            </div>

			                            <div class="form-group">
			                                <label for="upload"> Upload Image</label>
			                                <input type="file"  name="Upload" class="btn btn-info" required>
			                            </div>
			                            
			                            <lable><input id="right1" type="submit"  name="sub" value="Submit" class="btn btn-success"></label>
			                        </form>
			                    </div>
			                </div>

                        </div>
                   </div>
               </div>
            </div>
        </div> 
  </div>  

<div class="modal fade" id="updateProfile" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" align="center">Update Contact</h4>
            </div>

            <div class="modal-body">
              <div class="panel panel-default" style="background-color: rgba(132, 138, 138, 0.6); border:none;">
                    <div class="panel-heading" style="background-color: rgba(132, 138, 138, 0.6);">
                       <h5 align="center">Upload Contact Number </h5>
                    </div>
                    <div class="panel-body" style="background-color: rgba(132, 138, 138, 0.6);">

                            <form >
                                <div class="form-group">
                                    <label for="item Name">Contact Number </label>
                                    <input type="text" class="form-control" name="contact" pattern="[789]\d{7}">
                                </div>
                                                                                 
                                
                            </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Update </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle </button>
              <button type="button" class="btn btn-info" data-dismiss="modal">Save </button>
            </div>
      </div>      
    </div>
</div>

       
<script src="../assets/js/jquery-1.10.2.js"></script>  
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.metisMenu.js"></script> 
<script src="../assets/js/custom.js"></script>
<script>
	
//initially it hides upload form
    $('#show_form').show();
//it will show upload form
	$('#show_upload').click(function(){
		alert('hello');
		$('#show_form').show();

	});

//it will hide the google information
	$('#details').hide();
//it will show the information when clicked 
	$('#show_details').click(function(e){
		e.preventDefault();
		$('#details').toggle("slow");	
		
		$('#alert_done').addClass('animated fadeIn');
	});
//it will show details of item uploaded by logged in seller	
	$('#show_uploaded_by_me').click(function(e){
		var sent = "show_uploaded_by_me=1";
		$.ajax({
						
			url:'Seller.php',
			type:'POST',
			data:sent,
			success: function(responceData){
				
				$('#show_all').html(responceData);
			},
			error: function(){
				alert('ERROR ');	
			},
			complete: function(){				
				
			}
			
		});		
	});
		
</script>  
</body>
</html>
