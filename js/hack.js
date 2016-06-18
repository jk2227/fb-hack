
function foo(){
$.ajax({
        type: 'POST',
        url: "backend/main.py",
        data: {data: "xyz"}, //passing some input here
        dataType: "text",
        success: function(response){
           output = response;
           alert(output);
        }
}).done(function(data){
    console.log(data);
    alert(data);
});
}
