<?php
	//$conn = new mysqli('localhost','root','amit','nit-ket');
	
	class item
	{				
		function __construct()
		{
			$dbServer = 'localhost'; 	//Define database server host
			$dbUsername = 'root'; 		//Define database username
			$dbPassword = 'amit'; 		//Define database password
			$dbName = 'nit-ket'; 		//Define database name
			
			$con = new mysqli($dbServer,$dbUsername,$dbPassword,$dbName);
			if(mysqli_connect_errno()){
				die("Failed to connect with MySQL: ".mysqli_connect_error());
			}else{
				$this->connect = $con;
			}
		}
		

		public function displayName($item)
		{	
			$sql = "SELECT * FROM `item` WHERE `itemcategory`='$item'";
			$result =mysqli_query($this->connect,$sql);
			//$result = $conn->query($sql);
			if($result->num_rows>0)
			{	
				while($r = $result->fetch_assoc())
				{					
					echo '<div class="col col-sm-4  col-xs-12 text-center" id="itemlist">';
					echo '<p><b>Item Name :</b><span class="text-danger">'.$r['itemname'].'</span></p>';
					echo '<img src="user/'.$r['itempicture'].'"class="img responsive">';
					echo '<p><br/><b>Item Description:</b>'.$r['itemdesc'].'</p>';
					echo '<p><b>Item Price:</b>'.$r['itemprice'].'</p>';
					echo '<p><b>Item Status:</b><u>'.$r['itemstatus'].'</u></p>';
					echo '<a id="tipo" class="btn btn-danger" href="bid.php?itemid='.$r['itemid'].'">View Details and Bid Now </a>';
					echo '</div>';
				}				
			}else{
				echo 'Category is filled yet ....';
			}
		}

		public function DisplaybyItem($itemname)
		{

			include('../connect.php');
			$search = "SELECT * FROM `item` WHERE `itemname` like '%$itemname%'";
			$result = mysqli_query($this->connect,$search);
			if($result->num_rows>0)
			{
				
				while($r = $result->fetch_assoc()){
					echo '<div class="col col-sm-4  col-xs-12 text-center" id="itemlist">;
						<p><b>Item Name : -</b><span class="text-danger">'.$r['itemname'].'</span></p>
						<p><img src="user/'.$r['itempicture'].'"></p>
						<p><br/><b>Description: -</b>'.$r['itemdesc'].'</p>
						<p><b>Availibility :-</b><u>'.$r['itemstatus'].'</u></p>
					    <a class="btn btn-danger" onclick="check();">View Details and Bid Now </a></div>';
				}
			}else{
				echo '<h1 class="text-center text-info">No Item were Found </h1>';
			}
		}

		public function search_by_buyer()
		{
			include('../connect.php');
			$search = "SELECT * FROM `item` WHERE 1";
			$result = mysqli_query($this->connect,$search);
			if($result->num_rows>0)
			{
				
				while($r = $result->fetch_assoc()){
					echo '<div class="col col-sm-4  col-xs-12 text-center" id="itemlist" style="border:1px solid green;">;
						<p><b>Item Name : -</b><span class="text-danger">'.$r['itemname'].'</span></p>
						<p><img src="../seller/'.$r['itempicture'].'" height="200" width="200"></p>
						<p><br/><b>Description: -</b>'.$r['itemdesc'].'</p>
						<p><b>Availibility :-</b><u>'.$r['itemstatus'].'</u></p>
					    <a id="tipo" class="btn btn-danger" href="bid.php?itemid='.$r['itemid'].'">View Details and Bid Now </a></div>';
				}
			}else{
				echo '<h1 class="text-center text-info">No Item were Found </h1>';
			}
		}  // search buyer ends here 
	}

	$a = new item();
	if(isset($_POST['category'])){
		$item = $_POST['category'];		
	    $a->displayName($item);
	}

	if(isset($_POST['searchitem'])){
		$temp =$_POST['searchitem'];
		$a->DisplaybyItem($temp);
	}	

	if(isset($_POST['saveFeedback'])){
		echo 'hello';
	}

	if(isset($_POST['searchbybuyer'])){
		$a->search_by_buyer();
	}	

?>