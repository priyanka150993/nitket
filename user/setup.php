<?php	
	//Done By Amit 
	//Preference Form Displys while Page Loads fir the Futsrt Time 
	function show_pref_form()
	    {
		echo '<h3 align="center">Login As:-</h3>
			<div class="col col-md-4 col-md-offset-4" style="border:2px solid green;">
			    <form id="preference_form" method="POST">

			      <div class="form-group">
				<label for="email" class="text-center">Buyer</label>
				<input type="radio" class="form-control" name="usertype" value="B">
			      </div>

			      <div class="form-group" class="text-center">
				<label for="pwd">Seller</label>
				<input type="radio" class="form-control" name="usertype" value="S">
			      </div>

			      <div class="form-group" class="text-center">

				<button type="submit" class="center btn btn-danger">Save Preference</button>
			      </div>                   

			  </form>
			</div>';
	    }


	//Fertch Ip Address Of the Client  
	function fetch_ip(){
		return $_SERVER['REMOTE_ADDR'];
	}

	//Check if Buyer Exist Already 
	function is_buyer_exist($email,$link)
	{	
	
		$sql = "SELECT `Id` FROM `buyer` WHERE `email` = '$email'";
		$search_buyer = $link->query($sql);

		if($search_buyer->num_rows>0){
			return 'yes';
			
		}else{

			//isert as buyer and redirect 
			return 'no';
		}
	}
	//Check if Seller  Exist Already 
	function is_seller_exist($id,$link)
	{
		
		$sql = "SELECT `Id` FROM `seller` WHERE `Id` = '$id'";
		$search_buyer = $link->query($sql);

		if($search_buyer->num_rows>0){
			return 'yes';
			//header('Location:buyer/index.php?pref=buyer&loggedin=1');
		}else{
			//isert as seller and redirect 
			return 'no';
		}
	}
	
	//checking preference here 

	
	function check_pref($pref,$id,$email,$link)
	{				
		
		$i = fetch_ip();
        if($pref == 'B')
		{								
			if(is_buyer_exist($id,$link)=='yes'){	
				header('location:buyer/index.php?loggein=true&buyer=1');			
			
			}else{	
				//set_preference($a,$_SESSION['google_data']['id'],$_SESSION['google_data']['email'],$conn);
				$save_buyer="insert into `buyer` values('$id','$pref','$i',' ','$email')";	
				$link->query($save_buyer);
				header('location:buyer/index.php?loggein=true&buyer=1');				
			}
		} // buyer preference ends here 
	
		if($pref == 'S')
		{
			//echo is_seller_exist($id,$link);
			if(is_seller_exist($id,$link)=='yes'){
					
				header('location:seller/index.php?loggein=true&buyer=1');			
			
			}else{	
							
				$save_seller="insert into `seller` values('$email','$pref','$id','$i',' ')";	
				$link->query($save_seller);
				header('location:seller/index.php?loggein=true&buyer=1');				
			}				
		}				//Displaying Preference form                               	    //User havn't setup preference                                              	    //Display Preference Form 		
	}



 //Setting Up the Preference of the User  
	function set_preference($type,$id,$mail,$link)
    {    	
    	$ip = fetch_ip();	
    	if($type =='B')
    	{
    							   //Fetch Client IP address   		
    		$sql = "INSERT INTO `buyer` VALUES ('$id','$type','GOOGLE', '$ip', 'Contact','$mail')";
    		if($link->query($sql))
    		{
    		    echo 'updates for buyer successfully';
    		    //Redirect to Buyers page ;
	        }else{	            
	            echo 'Cant update buyer ';
	        }

    	}else if($type =='S'){
    		$ip = fetch_ip();						   //Fetch Client IP address
    		
    		$sql ="INSERT INTO `seller` VALUES ('$mail', '$type', '$id', '$ip', 'dsd')";

    		if($link->query($sql))
    		{
    		    echo 'updates for Seller successfully';
    		    //Redirect to sellers page
	        }else{	            
	            echo 'Cant update seller ';
	        }
    	}               
    }


   

    

?>
