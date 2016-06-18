function generateItinerary(){
	//this is just a dummy function for now 
	var input = {data: "hello world"}
	ajaxResult = $.ajax({
		url: "backend/main.php",
		method: 'POST',
		data: input,
		dataType: "text",
		error: function(error) {
          console.log(error);
        }
	});
	ajaxResult.success(function(data){
		data = JSON.parse(data);
		$("#results").html(data.key)
	});
}
