<?php
$class="col-lg-6";
if(array_key_exists('index', $data))$index=(string)$data['index'];
if(!array_key_exists('vName', $data))$data['vName']=$data['lable'];

if(array_key_exists('ClassData',$data)){




if(array_key_exists('form-class-div'))$class=$data['ClassData']['form-class-div'];

}else{
$class="col-lg-6";

}



if(array_key_exists('data', $data)){
		
		if(array_key_exists('input-size', $data['data']))$class= $data['data']['input-size'];

}
?>

<div class="form-group {{$class}}">

{{ Form::label($data['name'],$data['lable']) }} 


@if(array_key_exists('value',$data))



@if(array_key_exists('editLock',$data))


@if( $data['editLock']  )


 <fieldset disabled> 
 {{ Form::text($data['name'],$data['value'],['class'=>'form-control','tabindex'=>$index,'readonly','placeholder'=>'Enter '.$data['lable']] ) }}
 </fieldset>



{{Form::hidden($data['name'], $data['value'])}}
	

@else

{{Form::select($data['name'], $data['data'],$data['value'],['class'=>'form-control','tabindex'=>$index])}}

@endif







@else


{{Form::select($data['name'], $data['data'],$data['value'],['class'=>'form-control'])}}



@endif






@else


{{Form::select($data['name'], $data['data'],null,['class'=>'form-control'])}}



@endif


</div>

