<?php
if(array_key_exists('index', $data))$index=(string)$data['index'];
if(!array_key_exists('vName', $data))$data['vName']=$data['lable'];

if(array_key_exists('ClassData',$data)){



$class=$data['ClassData']['form-class-div'];

}else{
$class="col-lg-6";

}



if(array_key_exists('data', $data)){
		
		if(array_key_exists('input-size', $data['data']))$class= $data['data']['input-size'];

}


?>






<div class="form-group {{ $class }}">


{{ Form::label($data['name'], $data['vName'],['class'=>'col-md-4']) }}


 <div class="input-group">

      {{ Form::password($data['name'],['class'=>'form-control col-md-8','tabindex'=>$index,'placeholder'=>'Enter '.$data['lable'], 
    
    ]
     ) }}

     <div class="input-group-addon btn ms-btn-password-visible "  ms-target="{{$data['name']}}" ><i class="fa fa-eye-slash" id="{{$data['name']}}Icon"></i></div>
     </div>

 </div>

