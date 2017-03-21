<?php
//Google Authentication Done By Amit Kumar Soni
    include_once("user/config.php");					//Including Configuration For Google API KEY and Secrets
    include_once("user/includes/functions.php");
    include("connect.php");						//Connection File to Server 
    if(isset($_REQUEST['code'])){					//Getting ID Code from Google Server 
      $gClient->authenticate();
      $_SESSION['token'] = $gClient->getAccessToken();
      header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
    }

    if (isset($_SESSION['token'])) {
      $gClient->setAccessToken($_SESSION['token']);
    }

    if ($gClient->getAccessToken()) 
    {
        $userProfile = $google_oauthV2->userinfo->get();
        echo "<script>alert('Check User');</script>";
        $gUser = new Users();
        $gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
               
        $_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
        
        header("location: user/account.php");
        $_SESSION['token'] = $gClient->getAccessToken();

    } else {
        $authUrl = $gClient->createAuthUrl();				//Generating Login Link On The page 
    }

//Google Authentication Done By Amit Kumar Soni
?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <style>

          input[type=text] {
            height:50px;
            width: 100%;
            margin-top:10px;
            box-sizing: border-box;
            border:2px solid #ccc;
            font-weight: bold;
            border-radius: 0px;
            font-size: 16px;
            background-color: white; 
            background-repeat: no-repeat;
            padding: 4px 4px 4px 4px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
          }
          input[type=text]:focus {
           width: 100%;
         }
         #menu-top{color:red !important;}
         #menu-top>li{transition:all 0.4 linear !important;}
         #menu-top>li:hover{
          font-size:110%;
          transition:.4s all;
          border-left:3px solid black;
          border-right:3px solid black;
          border-bottom:2px solid red;
        }
        #itemlist{
          -webkit-box-shadow: -2px 5px 59px -3px rgba(0,0,0,0.41);
          -moz-box-shadow: -2px 5px 59px -3px rgba(0,0,0,0.41);
          box-shadow: -2px 5px 59px -3px rgba(0,0,0,0.41);
        }
        #glog{
          background-color: rgba(253, 95, 42, 0.6); 
        }
        #itemdetails img{
            height:250px;
            width:250px;
            border:2px solid green;
            transition:0.5s all;
            -webkit-box-shadow: -1px 3px 35px 3px rgba(0,0,0,0.77);
            -ms-box-shadow: -1px 3px 35px 3px rgba(0,0,0,0.77);
            -o-box-shadow: -1px 3px 35px 3px rgba(0,0,0,0.77);
            -moz-box-shadow: -1px 3px 35px 3px rgba(0,0,0,0.77);
            box-shadow: -1px 3px 35px 3px rgba(0,0,0,0.77);
        }

        #itemdetails img:hover{
            border-radius: 50%;
            transform:scale(1.1);
            -webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.77);
            -ms-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.77);
            -o-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.77);
            -moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.77);
            box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.77);
        }
        #glogin{background-color:red;}
        #feature_list{

          background-size:cover;
          background-image:url('assets/img/back.jpeg');
          background-position:center;
          background-attachment: fixed;
        }
      </style>

      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <![endif]-->
      <title>NIT-KET</title>      
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <link href="assets/css/animate.css" rel="stylesheet" />
      <link href="assets/css/flexslider.css" rel="stylesheet" />
      <link href="assets/css/style.css" rel="stylesheet" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />

  </head>
  <body>
          
  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
  </div>

  <div class="right-div">
  </div>          

  <!-- Right Div  END-->
  <section class="menu-section">
      <div class="container">
          <div class="row ">
              <div class="col-md-12">
                  <div class="navbar-collapse collapse">
                      <a class="navbar-brand" href="#" style="line-height:50px;">
                        <span style="font-weight:bolder;">NIT-KET</span>
                      </a>

                      <ul id="menu-top" class="nav navbar-nav navbar-right">
                          <li class="pull-left"></li>
                          <li><a href="index.php" class="menu-top-active" >HOME</a></li>
                          <li><a href="about.php" >ABOUT US</a></li>
                         
                          
                            <?php
                                if(isset($authUrl)) {
                                  echo '<li id="glogin"><a href="'.$authUrl.'">Login With Google</a></li>';
                                } else {
                                  echo '<li><a href="logout.php?logout">Logout</a></li>';
                                }
                            ?>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- MENU SECTION END-->
  
  <div id="slideshow-sec">
      <div id="carousel-div" class="carousel slide" data-ride="carousel" >
                 
                  <div class="carousel-inner">
                      <div class="item active">

                          <img src="assets/img/img2.jpg" alt="" />
                          <div class="carousel-caption">
                       
                          </div>
                         
                      </div>
                      <div class="item">
                          <img src="assets/img/tab.jpg" alt="" />
                          <div class="carousel-caption">
                        
                          </div>
                      </div>
                      <div class="item">
                          <img src="assets/img/laptop.jpg" alt="" />
                          <div class="carousel-caption">
                       
                          </div>                            
                      </div>
                  </div>
                  <!--INDICATORS-->
                   <ol class="carousel-indicators">
                      <li data-target="#carousel-div" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-div" data-slide-to="1"></li>
                      <li data-target="#carousel-div" data-slide-to="2"></li>
                  </ol>
                  <!--PREVIUS-NEXT BUTTONS-->
                  <a class="left carousel-control" href="#carousel-div" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-div" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
        </div>
  </div>
  <!-- Slide Show  -->
  
  <div class="container-fluid">
      <div class="row">          
          <div class="row">
              <h2 align="center">Search Item's Here</h2>
              <div class="col col-sm-12 text-center">
                <div class="container">
                    <input  type="text" name="search" placeholder="Search.." id="search_item">
                </div>    
              </div> 
          </div> 

          <hr size="3">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="container">
                    <h3 align="center">Select Category Here </h3>              
                      
                      <!-- fetch category dynamically  Done By Amit Kumar Soni -->
                      
			<?php
                        include('connect.php');				//Setup Connection With Server 
                        $sql = "SELECT distinct `itemcategory` FROM `item` WHERE 1";
                        $result = $conn->query($sql);
                        if($result->num_rows>0)
                        {
                          echo '<select class="form-control" id="cat_drop">';
                          while($r = $result->fetch_assoc()){
                            echo '<option>'.$r['itemcategory'].'</option>';
                          }
                          echo '</select><br/>';
                        }
                      ?>

                     <!-- fetch category dynamically  Done By Amit Kumar Soni -->
			
			
                    <div id="itemdetails"></div>
                </div>                 
              </div>
          </div>   
      </div>
  </div>
  <!-- container fluid  END-->


  <div class="below-slideshow" style="background-color:black;">
       <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="txt-block text-center">
                <span class="glyphicon glyphicon-usd fa-4x"></span>
                <h4 >Easy To Sell</h4>
                <p >
                  The Seller needs one eye, Whereas for Buyer hundred eyes are nevertoo many.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="txt-block text-center">
                <span class="glyphicon glyphicon-folder-open fa-4x"></span>
                <h4 >Varieties of Item</h4>
                <p >
                  A Cluster of items makes many choices for a good decision
                </p>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="txt-block text-center"><span class="glyphicon glyphicon-shopping-cart fa-4x"></span>
                <h4 >Easy To Buy</h4>
                <p >A Budget tells us what we cannot AFFORD, But it does not keep us from BUYING it.</p>
              </div>
            </div>
          </div>
       </div>
  </div>
  <!-- BELOW SLIDESHOW SECTION END-->
      
  <div class="container" style="background-color: white;">
    <div class="row pad-set">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="just-txt-div">
              <h2 class="text-center">See Product Videos Here </h2>
              <br />
              <p class="text-center"><strong>=Intro Video= </strong>.</p>
              <p class="text-center"><strong>=Product Search Video= </strong>.</p>
              <p class="text-center"><strong>=Search Category Video= </strong>.</p>
              <p class="text-center"><strong>=Database at a View=</strong>.</p>
              <p class="text-center"><strong>=A whole Product List is Here=  </strong>.</p>
         </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="just-txt-div">
              <br />

              <iframe class="vedio-style" src="https://www.youtube.com/embed/DjALBdkT6i0" frameborder="0" allowfullscreen></iframe>
              
            </div>
        </div>
    </div>
  </div>      
    
  <!--Container  END-->

  <div class="parallax-like">
      <div class="overlay"> 
          <div class="row">
              <div class="container">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="just-txt-div text-center">
                            <strong id="Buyer">300+</strong> 
                            <p id="Buyer">Buyer</p>
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="just-txt-div text-center">
                          <strong id="Buyer">100+</strong> 
                          <p id="Buyer">Seller</p>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  </div>
  <!-- PARALLAX LIKE SECTION END-->

  <div class="just-sec">
  <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="head-line text-center">Feature List </h1>
              </div>
          </div>

          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="just-txt-div text-center">
                          <i class="fa fa-exchange fa-3x"></i>
                          <h4>User Friendly </h4>
                          <p >
                           One stop for all NIT student
                         </p>

                       </div>
                 </div>

                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="just-txt-div text-center">
                      <i class="fa fa-key fa-3x"></i>
                      <h4>Easy To Customize</h4>
                    </div> 
                 </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="just-txt-div text-center">
                      <span class="glyphicon glyphicon-comment fa-4x"></span>
                      <h4>Confirmation Message</h4>
                    </div>
                </div>                 
          </div>
  </div> 

  <!--JUST SECTION END-->
  <div class="row">
      <div class="container " >
         <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="head-line">Item</h1>
                <br />
                </div>
          </div>
          <div class="row ">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <hr />
                 <div class="flexslider carousel">
                    <ul class="slides">
                      <li><a href="#" id="client"> <h3>Mobile</h3></a></li>
                      <li><a href="#" id="client"> <h3>Laptop</h3></a></li>
                      <li><a href="#" id="client"> <h3>Cycles</h3></a></li>
                      <li><a href="#" id="client"> <h3>NotePad</h3></a></li>
                      <li><a href="#"id="client"><h3>Tablate</h3></a></li>
                    </ul>
                 </div>
                 <hr />
                 <br />
              </div>
          </div>
      </div>
  </div>
         <!--CLIENT SECTION END-->
  <div class="row">       
         <div class="container " >
            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-12 set-div">
              <div class="just-txt-div text-center">
                <h3><strong>-- NIT-KET FEEDBACK --</strong> </h3>                       
                <div class="col col-sm-12">
                  <div class="container">
                    <div class="col-md-8">
                      <div class="form-area">  
                        <form role="form"  action="index.php" method="post" >
                            <br style="clear:both">

                            <div class="form-group">
                              <input type="text" class="form-control" name="name" placeholder="Name" required="required" pattern="[a-zA-Z ]{4,}">
                            </div>

                            <div class="form-group">
                              <input type="text" class="form-control"  name="email" placeholder="Email" required="required" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}">
                            </div>

                            <div class="form-group">
                              <input type="text" class="form-control"  name="mobile" placeholder="Mobile Number" required="required" pattern="[789][0-9]{9}">
                            </div>

                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" placeholder="Subject" required="required" pattern="[a-zA-Z ]{1,}">
                            </div>

                            <div class="form-group">
                              <textarea class="form-control"type="textarea"placeholder="Message" maxlength="140" rows="7" name="msg" required="required" pattern="[a-zA-Z ]{1,}"></textarea>
                            </div>

                            <div class="form-group">
                             <input type="submit" name="sub1" value="Send feddback">
                              <br/>
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

<div class="footer-sec" style="height:auto;">
    <div class="container">
      <div class="row">
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 social-div text-center">
              <h3> <strong>SOCIAL PRESENCE</strong> </h3>We love to be social,Catch Us On
              <a href="https://www.facebook.com/NiT-KeT-633867766783435/?ref=bookmarks" ><h4>FACEBOOK </h4></a>
              <a href="https://twitter.com/NiT_KeT" ><h4>TWITTER </h4></a>
              <a href="https://www.linkedin.com/company/nit-ket?trk=company_logo" ><h4>LINKEDIN </h4></a>         
          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
              <h3> <strong>PHYSICAL LOCATION</strong> </h3>Reach Us Below:
                <br />
              <h4></h4>
              <h4>NIT Calicut,</h4>
              <h4>Pin: 673601</h4>
          </div>

          
     

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <hr />
            <div style="text-align:right;padding:5px;">
                &copy;2017 Group4.com | <a href="http://www.binarytheme.com/" style="color:#fff;" target="_blank" >Designed By:S.com</a>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="container">
            <div class="col col-sm-8 col-sm-offset-2">
                 <div id="googleMap" style="width:100%;height:300px;border:3px dashed black;"></div>

            </div>
        </div>
      </div>
    </div>
</div>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/jquery.flexslider.js"></script>
<script src="assets/js/custom.js"></script>
<script src="function.js"></script>
<script>
	
	//Google Map Integration --Done By Amit Soni (My API Key is Used Here for Google Map)---
    function myMap() 
    {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    } 
	
	//Google Map Integration --Done By Amit Soni---
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1FFOKyytf0w9CjI05bIL8cny0xXRpvco&callback=myMap"></script>
<script>
  

</script>
</body>
</html>
<?php
	 include("connect.php");
	 if(isset($_POST['sub1']))
	 {
	 	$name1=$_POST['name'];
	 	$eml=$_POST['email'];
	 	$mob=$_POST['mobile'];
	 	$subj=$_POST['subject'];
	 	$msge=$_POST['msg'];
	 	$sql="INSERT INTO `feedback` values('NULL','$name1','$eml','$mob','$subj','$msge')";
	 	$run=mysqli_query($conn,$sql);
	 	if($run)
	 	{
	 		echo '<script>
    			alert("Successfully Send");
			</script>';
	 	}
	 	else
	 	{
	 		echo '<script>
    			alert("Error......");
			</script>';
	 	}
	 }
?>
