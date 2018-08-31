<?php 
$class="col-lg-6";
(array_key_exists('index', $data))?$index=(string)$data['index']:$index=null;

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


<div class="form-group {{$class}}">



{{Form::label($data['name'], $data['vName'])}}



{{Form::file($data['name'],null,['class'=>'form-control',] )}}

</div> 