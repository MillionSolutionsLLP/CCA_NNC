
	<?php

$class="col-lg-6";
//dd($data);
if(array_key_exists('index', $data))$index=$index+$data['index'];
if(!array_key_exists('vName', $data))$data['vName']=$data['lable'];

if(array_key_exists('ClassData',$data)){

if(array_key_exists('form-class-div',$data['ClassData']))$class=$data['ClassData']['form-class-div'];

}else{
$class="col-lg-6";

}



if(array_key_exists('data', $data)){
		
		if(array_key_exists('input-size', $data['data']))$class= $data['data']['input-size'];

}




	?>

<div class="form-group {{ $class }}">
 <fieldset disabled>
    {{ Form::label($data['name'], $data['lable']) }}
    
    {{ Form::text($data['name'], $data['value'],['class'=>'form-control','tabindex'=>$index,'readonly','placeholder'=>'Enter '.$data['lable']] ) }}
</fieldset>

@if(array_key_exists('value',$data))
{{Form::hidden($data['name'], $data['value'],['id'=>$data['name']."Hidden"])}}
@endif    
</div>