require('./bootstrap');
//window.Vue = require('vue');



setInterval(function() {
   //alert('a minutes');
   checkNewNotification ();
}, 1 * 1000); // 60 * 1000 milsec



var notificationLink=$('.ms-notification-btn').attr('ms-live-link');


var notificationColor=0;

var countCheck=0;

function checkNewNotification (){


  $.ajax({
                url: notificationLink+"/"+countCheck,  //server script to process data
                type: 'GET',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data,textStatus , xhr) {
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);

                //console.log(typeof data);
              

                if(typeof data == "object"){
                


                if(countCheck!=data.countCheck){

               console.log( data);

               countCheck=data.countCheck;


              var html="";
              jQuery.each(data.dData,function (index, item){
              
                html=html+"<li style='padding:5px;' class='ms-mod-btn list-group-item-info  ms-text-bold list-group-item-warning' ms-live-link='"+item.NotificationLink+"'>"+item.TextOfNotification+"</li>"


              });




               $('#notificationBox').html(html);

              if(notificationColor){
                $('.ms-notification-btn').removeClass('bg-success');
                 notificationColor=0;

              }else{

                   $('.ms-notification-btn').addClass('bg-success');
                  notificationColor=1;

              }



                }

               
               

                }else
                {

                  

                }

               
               

  

              
                },
                error: errorHandler = function(xhr, status, error) {
               if(xhr.status == 422){
                       
                       
                  if(typeof data == "object"){
                  

                countCheck=xhr.responseJSON.countCheck;

                }

                }



                },
                cache: false,
                contentType: false,
                processData: false
            }, 'json');


  var returnValue =false;

//console.log(countCheck);



  return returnValue;

}




$( document ).ready(function() {
  
     $('[data-toggle="tooltip"]').tooltip();
     $('[data-toggle="dropdown"]').dropdown();
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
}, 500);

});



$("#error").slideUp("5");


var master = 0;
var keycount = 0;


var news=0;
var tender=0;
var doc=0;

var pub=0;
var edit=0;
var view=0;
var add=0;
var item=0;

function getLinkFromShort(key){

  var obj="[ms-shortcut=\'"+key +"\']";
  var link = $(obj).attr('ms-live-link');

  return link;
}

$( "body" ).on( "keydown", function( event ) {



if(event.altKey){

event.preventDefault();


//Key 1
if(event.which == 49 ){
    

    if(item==0){

         var link=getLinkFromShort('1');
          getMsLink(link);
    }
   


}

//Key 2
if(event.which == 50 ){
    
    if(item==0){var link=getLinkFromShort('2');
        getMsLink(link);}


}


//Key 3
if(event.which == 51 ){
    
    if(item==0){var link=getLinkFromShort('3');
            getMsLink(link);}


}

//Key 4
if(event.which == 52 ){
    
    if(item==0){var link=getLinkFromShort('4');
            getMsLink(link);}


}

//Key 5
if(event.which == 53 ){
    
    if(item==0){var link=getLinkFromShort('5');
        getMsLink(link);}


}


//Key H
if(event.which == 72 ){
    
    var link=getLinkFromShort('h');

    getMsLink(link);

}


//Key P
if(event.which == 80 ){
    

    $("#profileModal").modal('show');

}



//Key Q
if(event.which == 81 ){
    
    var link=getLinkFromShort('q');
    window.location =link; 
    //getMsLink(link);

}



//Key A
if(event.which == 65 ){
  
    add=1;
    view=0;
    edit=0;
    item=0;

}


//Key V
if(event.which == 86 ){
  
    view=1;
    add=0;
    edit=0;
    item=0;



}

//Key i
if(event.which == 73 ){
    
    item=1;
    view=0;
    add=0;
    edit=0;



}



if(add){
  
  //Key N
  if(event.which == 78 ){
  
    add=0;

    var link=getLinkFromShort('a+n');

    getMsModLink(link);

  }

  ///key T
    if(event.which == 84 ){
  
    add=0;

    var link=getLinkFromShort('a+t');

    getMsModLink(link);

  }

}


if(view){

    //Key N
    if(event.which == 78 ){
    view=0;
    var link=getLinkFromShort('v+n');
    getMsModLink(link);

  }


  ///key T
    if(event.which == 84 ){
  
    view=0;

    var link=getLinkFromShort('v+t');

    getMsModLink(link);

  }



}


if(item){


  if(event.which == 48 ){
  
    item=0;
    var link=getLinkFromShort('i+0');
    getMsModLink(link);

  }


  if(event.which == 49 ){
  
    item=0;
    var link=getLinkFromShort('i+1');
    getMsModLink(link);

  }


  if(event.which == 50 ){
  
    item=0;
    var link=getLinkFromShort('i+2');
    getMsModLink(link);

  }

  if(event.which == 51 ){
  
    item=0;
    var link=getLinkFromShort('i+3');
    getMsModLink(link);

  }

  if(event.which == 52 ){
  
    item=0;
    var link=getLinkFromShort('i+4');
    getMsModLink(link);

  }

  if(event.which == 53 ){
  
    item=0;
    var link=getLinkFromShort('i+5');
    getMsModLink(link);

  }

  if(event.which == 54 ){
  
    item=0;
    var link=getLinkFromShort('i+6');
    getMsModLink(link);

  }

  if(event.which == 55 ){
  
    item=0;
    var link=getLinkFromShort('i+7');
    getMsModLink(link);

  }

  if(event.which == 56 ){
  
    item=0;
    var link=getLinkFromShort('i+8');
    getMsModLink(link);

  }

  if(event.which == 57 ){
  
    item=0;
    var link=getLinkFromShort('i+9');
    getMsModLink(link);

  }





}











}


});




$("body").on("click",".ms-js-btn",function (e){
e.preventDefault();

var tab2 =$(this).attr('ms-js-target');
    

   
   tab2='a[href="#'+tab2+'"]';
//   $('.tab-pane .active').tab('hide');
// //  $(tab2).tab('show');



  $(tab2).tab('show');


});




$("body").on("click",".ms-btn-password-visible",function (e){
e.preventDefault();

var div = "#"+$(this).attr('ms-target');

var type=$(div).attr('type');


var ico=div +"Icon";

if(type == "password"){

 $(ico).removeClass("fa-eye-slash");
 $(ico).addClass("fa-eye");
$(div).attr('type','text');

}else{
  $(ico).removeClass("fa-eye");
 $(ico).addClass("fa-eye-slash");
$(div).attr('type','password');

}


    

   


});





/////////////////////
////////////////////
///DO NOt EDIT/////
//////////////////
/////////////////


function setBreadcrumb(text){

  var data=text.split("/");
 // console.log(data);
  var html="";

  $( ".ms-breadcrumb" ).remove();
  data.forEach(function(item, index){

    html=html+'<li class="ms-breadcrumb">'+ item +'</li>';

  });
  


  $(".ms-breadcrumb-end").after(html);

}


function loadingOn() {
  $(".in").removeClass("in");
 $(".loading").fadeIn( "slow", function() {
    // Animation complete
  });;




}


function loadingOff() {
  
   $(".loading").fadeOut( "slow", function() {
    // Animation complete
  });

}

$("body").on("click",".ms-mod-btn",function (){


var link= $(this).attr('ms-live-link');

var breadcrumb=$(this).attr('ms-breadcrumb');


getMsModLink(link);
setBreadcrumb(breadcrumb);

//alert($(this).attr('ms-live-link'));

});





function getMsModLink(link) {
$(".ms-mod-tab").slideUp("slow");
loadingOn();


$.ajax({
                url: link,  //server script to process data
                type: 'GET',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data,textStatus , xhr) {
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);

                //console.log(typeof data);

                if(typeof data == "object"){
                  console.log( data);

                  if('redirectLink' in data){

                     window.location.replace(data.redirectLink);

                  }

                  if('redirectData' in data){
                 
                  $(".ms-mod-tab").html(data);
                  $(".ms-mod-tab").slideDown("fast");
                   

                  }

                 

                }else
                {

                   $(".ms-mod-tab").html(data);
                  $(".ms-mod-tab").slideDown("fast");

                }

               
               

               loadingOff();

              
                },
                error: errorHandler = function(xhr, status, error) {
               if(xhr.status == 422){
                         $('html, body').animate({
                            scrollTop: $("#error").offset().top
                           }, 300);

                       alert(status+': Access Denied');
                       }

                  $(".ms-mod-tab").slideDown("fast");
       


               loadingOff();


                },
                cache: false,
                contentType: false,
                processData: false
            }, 'json');

}


function getMsLink(link) {
$(".ms-live-tab").slideUp("slow");
loadingOn();



$.ajax({
                url: link,  //server script to process data
                type: 'GET',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data) {
                
                $(".ms-live-tab").html(data);
                $(".ms-live-tab").slideDown("fast");
               loadingOff();

              
                },
                error: errorHandler = function(xhr, status, error) {
                       // console.log(xhr);
                
                   // alert("Something went wrong!"+ "Error is : "+status);
                },
                cache: false,
                contentType: false,
                processData: false
            }, 'json');

}



$("body").on("click",".ms-live-btn",function (){


var link= $(this).attr('ms-live-link');
var breadcrumb=$(this).attr('ms-breadcrumb');
    getMsLink(link);
    setBreadcrumb(breadcrumb);

});

$("body").on("submit","form",function (){

event.preventDefault();

});


$("form").on("click",".ms-form-btn",function (){
event.preventDefault();
var link= $('.ms-form').attr('action');

            $.ajax({
                url: link,  //server script to process data
                type: 'POST',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data) {
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);
                //console.log(data);
              //data=$.parseJSON(data);
              //console.log(data);


                console.log(data);
                $a =1;
                if($a==0){




                  if("redirect" in data){
                    
                     //localStorage.LastPage = data.redirect;
                    location.replace(data.redirect);
                   
                  //  console.log(data->redirect);
                }else{
                      
                      if ("redirectData" in data) {

                        getMsModLink(data.redirectData);

                      }else{
                        //location.reload();
                      }
                    
                }


                }

                
               // alert(data.redirect);
                  location.replace(data.redirect);
                },
                error: errorHandler = function(xhr,status, error) {
               





            
                      if(xhr.status == 422){
                         $('html, body').animate({
                            scrollTop: $("#error").offset().top
                           }, 300);

                         $("#error").slideDown("5");
                       }

                      // $(".ms-process-bar").css("width", "100%");
                       //$(".ms-process-bar").css("width", "0%");     
                   // alert("Something went wrong!"+ "Error is : "+error+","+status);
                     var html="";
                 jQuery.each(xhr.responseJSON.msg,function (item, index){

                  html+='<span><i class="fa fa-exclamation" aria-hidden="true"></i> '+index+'</span><br>';
                 $("#error").html(html);
                 $("#error").slideDown();


                 });
                
                    //alert("Something went wrong!"+ "Error is : "+status);
                },
                // Form data
                data: new FormData($('.ms-form')[0]),
                // Options to tell jQuery not to process data or worry about the content-type
                cache: false,
                contentType: false,
                processData: false
            }, 'json');
});

$("body").on("click",".ms-file-download",function (e){

//alert('row clicked');
var url=$(this).attr('ms-link');

window.open(url, '_blank'); 
//window.location.href = url;


});