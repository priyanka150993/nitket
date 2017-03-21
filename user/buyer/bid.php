<?php
  session_start();
  $email=$_SESSION['google_data']['email'];
  
   if(isset($_GET['itemid']))
   {
     $itemid=$_GET['itemid'];
     $_SESSION['itemid']=$itemid;
   }
class Bid
{	
    public $itemId;
    private $bidAmount;
    private $startTime;
    private $closeTime;
    public $temp1;
    function __construct($itemid) 
    {
	  $this->itemId = $itemid;
	  $conn = mysqli_connect("localhost","root","amit","nit-ket");
      $query = mysqli_query($conn,"SELECT * FROM bid WHERE itemid = $this->itemId") or die (mysqli_error());
	  $row = mysqli_fetch_array($query);
	  $this->itemId = $row['itemid'];
	  $this->startTime = $row['stime'];
	  $this->closeTime = $row['ctime']; 
	  $this->bidAmount = $row['initialamount'];
	  $query = mysqli_query($conn,"SELECT email,max(amount) FROM participant WHERE itemid = $this->itemId");
	  $row = mysqli_fetch_array($query);
	  $temp= $row[1];
	  if ($temp > $this->bidAmount)
      {
	    $this->bidAmount= $temp;
		$this->temp1=$row[0];
      }
	}
   public function updateBid()
    {
	  $conn = mysqli_connect("localhost","root","amit","nit-ket");
      $amt=$_POST['amt'];
	  if($amt >$this->bidAmount){
		   $this->bidAmount=$amt;
		  $email=$_SESSION['google_data']['email'];
			mysqli_query($conn,"insert into participant values ('$email','$this->itemId',now(),'$amt')");
			echo '<script type="text/javascript">alert("Congratulations!!! you are the hghest bidder");</script>';
			 header("Refresh:0");
		}
		 else echo '<script type="text/javascript">alert("You have to bid more than higher bid price");</script>';
    }

     public function sendConfirmationSeller(\Seller $seller)
    {
		
    $to = "somebody@example.com";
    $subject = "Status Of Auction";
    $txt = "Your Product have been sold to ID no:";
    $headers = "From: nitket2017@gmail.com" . "\r\n" .
    mail($to,$subject,$txt,$headers);
    echo '<script type="text/javascript">alert("Congfirmation to seller send successfull");</script>';
    }

    public function sendConfirmationBuyer(\Buyer $buyer)
    {
	$to = "somebody@example.com";
    $subject = "Status Of Auction";
    $txt = "You are winner of this Product Id:";
    $headers = "From: nitket2017@gmail.com" . "\r\n" .
    mail($to,$subject,$txt,$headers);
       echo '<script type="text/javascript">alert("Congfirmation to buyer send successfull");</script>';
    }
	
	public function printbid()
    {
	 echo $this->bidAmount;
	}
	
	public function viewTime()
    {
	 return $this->closeTime;
	}
	
}
 $itemid=$_SESSION['itemid'];
 $abid = new Bid($itemid);
 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="nitc.ico">
<title>NIT-KET</title>
<link href="nitc.ico" rel="icon">
<link rel="stylesheet" type="text/css" href="final_ass.css">
<link rel="stylesheet" type="text/css" href="menu_file.css">
<link rel="stylesheet" type="text/css" href="left_division.css">
<link rel="stylesheet" type="text/css" href="right_division.css">
</head>

<body style="background-color:hsla(357,21%,78%,1.00)">
	<div class="header">
		
		<h1 align="middle">&nbsp;&nbsp;&nbsp;&nbsp;Bidding Page</h1>
			<h3 align="middle">NIT-KET</h3>
		
	</div>
    <div class="menu">
    	<ul>
        	<li><a href="home.php">Home</a></li>
			<li >
            	<div class="dropdown">
                  <a class="dropbtn">Products</a>
                  
                </div>        
            </li>
           
            
            <li><a href="">Contact Us</a></li>
        </ul>
    </div>
    <br/>

    
    <div class="left">
    	
        <ul>
        	
			<li>Categories</li><br>
			<li><a href="">Laptop Computer</a></li><br>
			<li><a href="cellphone.php">Cellphone</a></li><br>
			<li><a href="">Computer Accessories</a></li><br>
			<li><a href="">Desktop Computer</a></li><br>
			
			
        </ul>
    </div>
    
    <div class="right">
    	
		
		
		
		
    </div>
    
    <div class="center">
    <h2 align="center" ></h2>
	<table border=10>
		<?php  
		   $conn = mysqli_connect("localhost","root","amit","nit-ket");
           $query = mysqli_query($conn,"SELECT itempicture FROM item WHERE itemid = $abid->itemId") or die (mysqli_error());
	       $row = mysqli_fetch_array($query);
		   $pic=$row[0];
		?>
			<img src="nokia.jpeg" align="middle" style="width:300px;height:220px;">
			
		<!--interface of bid -->
		<tr>
			<th>ItemId: </th>
			<th><?php echo $abid->itemId; ?></th>
		</tr>
		<tr>
			<th>Highest Bid: </th>
			<th><?php $abid->printbid(); ?></th>
			
		</tr>
		<tr>
			<th>Hoghest Bidder:</th>
			<th><?php echo $abid->temp1; ?></th>
		</tr>
		<tr>
			<th>Time Left to Bid:</th>
			<th><?php $closetime = $abid->viewTime(); ?>
								<script>
   var t= ("<?php echo $closetime; ?>".split(/[- :]/));  
var end = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]); 
   
    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;
    function showRemaining() {
       var now = new Date();
        var distance = end - now;
        if (distance < 0) {
            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'Bidding Closed';
			document.getElementById('bok').style.display="none";

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById('countdown').innerHTML = days + ' days ';
        document.getElementById('countdown').innerHTML += hours + ' hrs ';
        document.getElementById('countdown').innerHTML += minutes + ' mins ';
        document.getElementById('countdown').innerHTML += seconds + 'secs';
    }

    timer = setInterval(showRemaining, 1000);
</script>
<div id="countdown"></div>								

							</th>
		</tr>
		<tr>
			
		</tr>
		<tr>
		<th>
		<form action="bid.php" method="post" id="bok">
				Enter Bid Amount:<input type="text" name="amt">
								<input type="submit" value="Place Bid" name="sub">
				</form>	
			
			</th>
			
			
		
			<th><a href="showdata.php">Click here to View Bidding Log.</a></th>
			<th></th>
		</tr>
		<tr>
		
		
		
		
			
	
	
	
	</table>
   
   
    </div>
    
    <div class="footer">
            <h3>COPYRIGHTS &COPY; 2017 NIT-KET. ALL RIGHTS RESERVED</h3>    	
    </div>
	
	<?php
	 if (isset($_POST['sub']))
	 {
	  $abid->updateBid();
	 }
	?>
	
</body>
</html>
