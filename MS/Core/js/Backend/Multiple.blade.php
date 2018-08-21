
var input=1;
var other={};
var otherContaine="";

other[0]=0;
other[input]=0;
$( ".AddSectionBtn" ).bind( "click", function() {

	input=parseInt($(this).attr('ms-input-count'));


	var totalFile=10;
	
	if(input > totalFile ){

		alert("Only "+totalFile+" Files allowed to attach.");

	}else{


	input=input+1;
	$(this).attr('ms-input-count',input);
 	var html=$(".DynamicSection:first").html();




 	

	$(".DynamicSection:last").after("<div class='DynamicSection row' style='margin-left: 0px;margin-right: 0px;' ms-has-other='"+input+"'> <div class='col-lg-12'><br>"+html+"<span class='btn btn-sm btn-default btn-danger glyphicon glyphicon-remove pull-right RemoveSectionBtn' style='padding:2px 2px;'></span></div><div class='col-lg-12'></div>");



 	if(other[1]){



	$(".DynamicSection .ms-other:last").remove();


 	}


	}



	

	
});







