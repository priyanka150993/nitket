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


$(document).ajaxStart(function(){
	$('#load').fadeOut();
});
