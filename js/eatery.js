function addCurrent(btn){
	console.log(btn.innerHTML);
	$("#selectedPlaces").append("<tr><td>"+btn.innerHTML+"</td><td><input type = 'number' name = 'duration' value = '1' min = '0.5' max = '5'/></td><td><button onclick = 'removeBtn(this)' value = '"+btn.innerHTML+"'>Remove</button></td></tr>");

	btn.remove();
}

function addPlace(btn){
    //console.log($(btn).parent().parent().children()[1].children[0].innerHTML);
	$("#selectedPlaces").append("<tr><td>"+$(btn).parent().parent().children()[1].children[0].innerHTML+"</td><td><input type = 'number' name = 'duration' value = '1' min = '0.5' max = '5'/></td><td><button onclick = 'removeBtn(this)' value = '"+$("#ssingPoint").val()+"'>Remove</button></td></tr>");
}

function removeBtn(btn){
	console.log(btn.value);
	$("#sightseeingForm").append("<button onclick = 'addCurrent(this)' >"+btn.value+"</button><br>");
	console.log(btn);
	console.log($(btn).parent());
	console.log($(btn).parent().parent());
	$(btn).parent().parent().remove();
}