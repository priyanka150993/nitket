<?php
	 
	 $conn = new mysqli('localhost','root','amit','nit-ket');
	 if(isset($_POST['submit']))
	 {	 	
	 	echo 'hello ';


	 	$name1=$_POST['name'];
	 	$eml=$_POST['email'];
	 	$mob=$_POST['mobile'];
	 	$subj=$_POST['subject'];
	 	$msge=$_POST['msg'];

	 	$sql="INSERT INTO `feedback`  VALUES ('$name1', '$eml', '$mob', '$subj', '$msge')";
	 	
	 	$run=mysqli_query($conn,$sql);
	 	if($run){
	 		echo 'Thank you for your valuable feedback..............';
	 	}
	 	else{
	 		echo 'Something Went Wrong ....';
	 	}
	 }
?>
