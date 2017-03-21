<?php
    session_start();
    include('../setup.php');   
    $conn = new mysqli('localhost','root','','nit-ket') or die('Cant Connect To server ....');
    if(!isset($_SESSION['google_data'])):header("Location:../index.php");endif;  
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
    #details{
        color:black;
        font-size: 28px;
    }

    #itemlist{transition:0.5s linear;}
    #itemlist:hover{
            -webkit-box-shadow: 2px 4px 55px -12px rgba(0,0,0,0.75);
            -moz-box-shadow: 2px 4px 55px -12px rgba(0,0,0,0.75);
            box-shadow: 2px 4px 55px -12px rgba(0,0,0,0.75);
    }
    .btn btn-danger:hover{

        background-color:white;
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
                    <li><a href="#renderTable" id="listAll"><i class="fa fa-square-o fa-2x"></i>Display Available Items</a></li>
                    <li id="show_details"><a href="#" ><i class="fa fa-square-o fa-2x"></i>Show My Google Details</a></li>                 
                </ul>
            </div>
        </nav>  
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 align="center">Welcome <?php  echo  $_SESSION['google_data']['name'];?></h2>                                       
                        <div class="col col-md-12" id="details">
                            <table class="table">
                            <tr><th></th><th></th></tr>
                            <?php   
                                echo '<tr><td>Name</td><td>'.$_SESSION['google_data']['given_name'].'</td></tr>';    
                                echo '<tr><td>Google Id</td><td>' . $_SESSION['google_data']['id'].'</td></tr>';
                                echo '<tr><td>Name</td><td>'. $_SESSION['google_data']['name'].'</td></tr>';
                                echo '<tr><td>Email </td><td>' . $_SESSION['google_data']['email'].'</td></tr>';
                                echo '<tr><td>Gender</td><td>' . $_SESSION['google_data']['gender'].'</td></tr>';
                                echo '<tr><td>Language Preference </td><td>' . $_SESSION['google_data']['locale'].'</td></tr>';                 
                            ?>
                            </tr></table>
                        </div>
                        <div class="col col-md-12" id="allItem"></div>
                    </div>
                </div>              
            </div>
        </div> 
</div>            
<script src="../assets/js/jquery-1.10.2.js"></script>  
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.metisMenu.js"></script> 
<script src="../assets/js/custom.js"></script>
<script>
	$('#details').hide();
	$('#show_details').click(function(e){
		e.preventDefault();
		$('#details').toggle("slow");	

	});	

    $(document).ready(function(){
        var ss ='searchbybuyer=1';
          $.ajax({
                url:'../../g_func/fetchitem.php',
                method:'POST',
                data:ss,
                cache:false,
                success:function(responceData){ 
                  $('#allItem').html(responceData);
                },
                error:function(error){
                  alert('OOPS errror while getting category ... '+error);
                },
                complete:function(){
                  console.log('Ajax Completed .. ');
                }
          });
    });
</script>  
</body>
</html>
