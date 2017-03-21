<?php
    session_start();
    include('setup.php');
    $conn = new mysqli('localhost','root','amit','nit-ket') or die('Cant Connect To server ....');    
    if(!isset($_SESSION['google_data'])):header("Location:index.php");endif;

    if(isset($_POST['usertype']))
    {
        
		$a = $_POST['usertype'];		
		check_pref($a,$_SESSION['google_data']['id'],$_SESSION['google_data']['email'],$conn);
        
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>-Admin Page-</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<style>
    .navbar{background-color: black;}
    .navbar-header{background-color:black;}
    .nav li{background-color:black;}
    #details{color:white;}
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
        <a href="logout.php?logout" class="btn btn-danger">Logout Now</a></div>
        
        </nav>   

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li><?php echo '<img src="'.$_SESSION['google_data']['picture'].'" alt="" class="img img-responsive" width="250" height="220"';?></li>
                    <li><?php echo '<a href="'.$_SESSION['google_data']['link'].'"><i class="fa fa-google-plus text-center fa-2x" aria-hidden="true"></i>My G+Link</a>';?></li>
                   
                    <li id="show_details"><a href="#" ><i class="fa fa-square-o fa-2x"></i>Show My Google Details</a></li>

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
                     
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 align="center">Welcome <?php  echo  $_SESSION['google_data']['name'];?></h2>   
                        <h5 align="center"><?php  echo  $_SESSION['google_data']['name'];?>  , Have a great day . </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr />
                <hr />                
                      
            <div class="row" >                    
               <div class="col-md-12 col-sm-12 col-xs-12">
                   <?php
				   
						show_pref_form();				//located in setup.php
                      
                        if(isset($_GET['uploaded']))
                        {
                          echo '<div class="alert alert-danger animated bounceOutLeft">Item Uploaded Sucessfully</div>';    
                        }

                    ?>
            </div>
        </div>
    </div>
</div>     
    <script src="assets/js/jquery-1.10.2.js"></script>  
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script> 
    <script src="assets/js/custom.js"></script>
    <script>
		$('#details').hide();
		$('#show_details').click(function(e){
			e.preventDefault();
			$('#details').toggle("slow");	

		});	
    </script>  
</body>
</html>