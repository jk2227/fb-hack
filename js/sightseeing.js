
$(document).ready(function() {
	// https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=YOUR_API_KEY
	var geocoder = new google.maps.Geocoder();
	var address = userDestination;
	// console.log(address);
	geocoder.geocode( { 'address': address}, function(results, status) {
		// console.log(status);
	if (status == google.maps.GeocoderStatus.OK) {
	    var latitude = results[0].geometry.location.lat();
	    var longitude = results[0].geometry.location.lng();
	    var destination = new google.maps.LatLng(latitude,longitude);
	 //    service = new google.maps.places.PlacesService(map);
		// service.nearbySearch(request, callback);
		map = new google.maps.Map(document.getElementById('map'), {
	      center: destination,
	      zoom: 15
	    });

	  var request1 = {
	    location: destination,
	    radius: '50000',
	    type: "natural_feature"
	  };

	  var request2 = {
	    location: destination,
	    radius: '50000',
	    type: "park"
	  };

	  service = new google.maps.places.PlacesService(map);

	  service.nearbySearch(request1, callback);
	  service.nearbySearch(request2, callback);
	    } 
	}); 	
});




function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
    	$("#sightseeingForm").append("<button class = 'addPlace' onclick = 'addCurrent(this)' >"+results[i].name+"</button><br>");
      // console.log(results[i].name);
    }
  }
}

function addCurrent(btn){
	// console.log(btn.innerHTML);
	$("#selectedPlaces").append("<tr><td>"+btn.innerHTML+"</td><td><input type = 'number' name = 'duration' value = '2' min = '1' max = '24'/></td><td><button onclick = 'removeBtn(this)' value = '"+btn.innerHTML+"'>Remove</button></td></tr>");
	btn.remove();
}

function addPlace(){
	$("#selectedPlaces").append("<tr><td>"+$("#ssingPoint").val()+"</td><td><input type = 'number' name = 'duration' value = '2' min = '1' max = '24'/></td><td><button onclick = 'removeBtn(this)' value = '"+$("#ssingPoint").val()+"'>Remove</button></td></tr>");
}

function removeBtn(btn){
	// console.log(btn.value);
	$("#sightseeingForm").append("<button class = 'addPlace' onclick = 'addCurrent(this)' >"+btn.value+"</button><br>");
	// console.log(btn);
	// console.log($(btn).parent());
	// console.log($(btn).parent().parent());
	$(btn).parent().parent().remove();
}

function ajax(){
	// console.log($("tr"));
	var result = $("tr");
	var arr = Array();
	if (result.length>1){
		for (var i = 1; i < result.length; i++){
			// console.log(result[i].children[0].innerHTML)
			// console.log(result[i].children[1].children[0].value)
			console.log({"name": result[i].children[0].innerHTML, "duration": result[i].children[1].children[0].value});

			arr.push(result[i].children[0].innerHTML);
			console.log(arr);
		}
	}
	console.log(arr);
	var data1 = {places: "arr"};
	  searchResult = $.ajax({
	    url: 'php/sightseeingAjax.php',
	    method: 'POST',
	    data: data1,
	    dataType: 'text',
	    error: function(error) {
	      console.log(error);
	    }
	  });

	  searchResult.done(function (data){
	  	console.log("success");
	  	console.log(typeof(data));
	  })

}