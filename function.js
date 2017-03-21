//Search Items when User selects some item form dropDown menu 

$('#cat_drop').change(function(){
	var s ='category='+$("#cat_drop option:selected" ).text();
	$.ajax({
		url:'g_func/fetchitem.php',
		method:'POST',
		data:s,
		cache:false,
		success:function(responceData){	
			$('#itemdetails').html(responceData);
		},
		error:function(error){
			alert('OOPS errror while getting category ... '+error);
		},
		complete:function(){
			console.log('Ajax Completed .. ');
		}
	});
});

//As soon as user entres any item name  This ajax call will be fired and result will shown on the same page  
$('#search_item').keyup(function(){
      var ss ='searchitem='+$("#search_item" ).val();
      $.ajax({
        url:'g_func/fetchitem.php',
        method:'POST',
        data:ss,
        cache:false,
        success:function(responceData){ 
          $('#itemdetails').html(responceData);
        },
        error:function(error){
          alert('OOPS errror while getting category ... '+error);
        },
        complete:function(){
          console.log('Ajax Completed .. ');
        }
  });
});

//When Ajax call is fired Loader will Be Displayed On The same Page 
$(document).ajaxStart(function(){
	$('#load').fadeOut();
});
