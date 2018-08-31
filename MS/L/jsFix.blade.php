
$("#error").hide();



$(document).on("click",".RemoveSectionBtn",function(){
 
  var id2=  $(this).closest('.DynamicSection').attr('ms-has-other'); 

  other[id2]=0;
  $(this).closest('.DynamicSection').remove();
 // alert($("[ms-input-count]").attr('ms-input-count'));
var input =parseInt($("[ms-input-count]").attr('ms-input-count'));
  $("[ms-input-count]").attr('ms-input-count',input-1);

});




$( ".btn-frm-submit" ).click(function() {
    $( "form" ).submit();
});


$( "form" ).submit(function( event ) {
$("#error").slideUp("5");
$("#error").html("");
  
   // $( ".nav-second-level" ).removeClass( "in" );
    //$(".ms-process-bar").css("width", "20%");
  	event.preventDefault();

	var link= $(this).attr('action');
//$(".ms-process-bar").css("width", "40%");
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
            
                var dataload=0
              // console.log(data.loadData);  
               if("loadData" in data){

                     $(".ms-mod-tab").html(data.loadData);;

                  }else{
                    
                            if("redirect" in data){
                    //$(".ms-process-bar").css("width", "100%");
                   //localStorage.LastPage = data.redirect_page;
                    $(".ms-mod-tab").slideUp();
                   $.get(data.redirect_page, function(data, status){
        
                  $(".ms-mod-tab").html(data);
                

                   $(".ms-mod-tab").slideDown();
                 //$(".ms-process-bar").css("width", "100%");
                  //$(".ms-process-bar").css("width", "0%");
                  });

                   // location.replace(data.redirect);
                  //  console.log(data->redirect);
                }else{


                    if ("redirectData" in data) {

                        getMsModLink(data.redirectData);

                      }else{

                      if("redirectLink" in data)

                        window.location.replace(data.redirectLink);
                      }

                }

        

                }
                // alert(data.redirect);
                  //location.replace(data.redirect);
                },
                error: errorHandler = function(xhr, status, error) {
                         event.preventDefault();
                         console.log(xhr.responseText);


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
                },
                // Form data
                data: new FormData($('form')[0]),
                // Options to tell jQuery not to process data or worry about the content-type
                cache: false,
                contentType: false,
                processData: false
            }, 'json');

});



function getMsModLink(link) {
$(".ms-mod-tab").slideUp("fast");
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
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);
                $(".ms-mod-tab").html(data);

            

              
                },
                error: errorHandler = function(xhr, status, error) {
                                   if(xhr.status == 422){
                         $('html, body').animate({
                            scrollTop: $("#error").offset().top
                           }, 300);

                       alert(status+': Access Denied');
                       }

                 
       


          

                },
                cache: false,
                contentType: false,
                processData: false
            }, 'json');

                 $(".ms-mod-tab").slideDown("fast");
                 loadingOff();

}

function loadingOn() {
  
 $(".loading").fadeIn( "slow", function() {
    // Animation complete
  });;




}


function loadingOff() {
  
   $(".loading").fadeOut( "slow", function() {
    // Animation complete
  });

}