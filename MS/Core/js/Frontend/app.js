require('./bootstrap');
//window.Vue = require('vue');




$( document ).ready(function() {
  
   
setInterval(function(){
   var date = new Date();
   var currentTime = new Date ( );
    var currentHours = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    var currentSeconds = currentTime.getSeconds ( );

    // Pad the minutes and seconds with leading zeros, if required
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

    // Choose either "AM" or "PM" as appropriate
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

    // Convert the hours component to 12-hour format if needed
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

    // Convert an hours component of "0" to "12"
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;

    // Compose the string for display
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
    
    
    $("#clock").html(currentTimeString);   
}, 1000);

});




$("body").on("click",".ms-row-f",function (e){

//alert('row clicked');
var url=$(this).attr('ms-link');
window.location = url;


});


$("body").on("click",".ms-file-download",function (e){

//alert('row clicked');
var url=$(this).attr('ms-link');

window.open(url, '_blank'); 
//window.location.href = url;


});




