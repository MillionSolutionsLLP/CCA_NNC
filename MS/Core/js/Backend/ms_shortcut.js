
var master = 0;
var keycount = 0;


var news=0;
var tender=0;
var doc=0;

var pub=0;
var edit=0;
var view=0;
var add=0;



$( "body" ).on( "keydown", function( event ) {



if(event.altKey){

event.preventDefault();


//Key 1
if(event.which == 49 ){
    
    var link=getLinkFromShort('1');
    getMsLink(link);


}

//Key 2
if(event.which == 50 ){
    
    var link=getLinkFromShort('2');
    getMsLink(link);


}


//Key 3
if(event.which == 51 ){
    
    var link=getLinkFromShort('3');
    getMsLink(link);


}

//Key 4
if(event.which == 52 ){
    
    var link=getLinkFromShort('4');
    getMsLink(link);


}


//Key H
if(event.which == 72 ){
    
    var link=getLinkFromShort('h');

    getMsLink(link);

}


//Key P
if(event.which == 80 ){
    

    $("#profileModal").modal('toggle');

}



//Key Q
if(event.which == 81 ){
    
    var link=getLinkFromShort('q');
    window.location =link; 
    //getMsLink(link);

}


//Key P
if(event.which == 80 ){
  edit=0;
  pub=1;

}

if(event.which == 69 ){
  edit=1;
  pub=0;
}



if(pub ==1){

//Key N
if(event.which == 78 ){

  var link=$("[ms-shortcut='p+n']").attr('ms-live-link');
  //var link="http://"+window.location.hostname + "/admin/NM/add/news" ; 
  getMsModLink(link);pub=0;
}


if(event.which == 84 ){
 var link="http://"+window.location.hostname + "/admin/TM/add/tender" ; 
  getMsModLink(link);pub=0;
}

if(event.which == 68 ){
 var link="http://"+window.location.hostname + "/admin/DM/add/document" ; 
  getMsModLink(link);pub=0;
}



}







}



//console.log(master);
//console.log( event.type + ": " +  event.which);
});