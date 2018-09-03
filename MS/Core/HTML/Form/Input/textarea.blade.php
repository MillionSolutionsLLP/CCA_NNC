<?php
if(array_key_exists('index', $data))$index=(string)$data['index'];
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

<div class="form-group {{ $class }} ">
    {{ Form::label($data['name'], $data['vName']) }}
    {{ Form::textarea($data['name'], $data['value'],['class'=>'form-control','tabindex'=>$index,'placeholder'=>'Enter '.$data['vName'],'rows'=>'1'] ) }}
</div>