






var input=1;
$( ".AddSectionBtn" ).bind( "click", function() {

	input=parseInt($(this).attr('ms-input-count'));

	
	if(input > 3 ){

		alert("Only 4 Files allowed to attach.");

	}else{
	input=input+1;
	$(this).attr('ms-input-count',input);
 	var html=$(".DynamicSection").html();
	$(".DynamicSection:last").after("<div class='DynamicSection row'> <div class='col-lg-12'><br>"+html+"<span class='btn btn-sm btn-default btn-danger glyphicon glyphicon-remove pull-right RemoveSectionBtn' style='padding:2px 2px;'></span></div><div class='col-lg-12'></div>");


	}
	

	
});







