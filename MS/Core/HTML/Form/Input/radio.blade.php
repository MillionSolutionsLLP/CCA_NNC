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
<div class="form-group {{$class}}">
{{ Form::label($data['lable'], $data['name']) }} 

<div class="radio">
<?php //	dd($data); ?>




@foreach($data['data'] as $value=>$lable)
<label tabindex="{{$index}}" class="form-conrtol">

	@if ($value == $data['value'])
	{{Form::radio($data['name'], $value,true,['id'=>$data['name'].$loop->iteration])}}
    {{$lable}}
	
	@else
    {{Form::radio($data['name'], $value,null,['id'=>$data['name'].$loop->iteration])}}
    {{$lable}}
	@endif
	
  	
  </label>
@endforeach

</div>
</div>

