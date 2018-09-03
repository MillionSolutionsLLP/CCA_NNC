<?php
$class="col-lg-6";

if(array_key_exists('index', $data))$index=(string)$data['index'];

if(!array_key_exists('vName', $data))$data['vName']=$data['lable'];

if(array_key_exists('ClassData',$data)){




if(array_key_exists('form-class-div' ,$data['ClassData']))$class=$data['ClassData']['form-class-div'];

}else{
$class="col-lg-6";

}



if(array_key_exists('data', $data)){
		
		if(array_key_exists('input-size', $data['data']))$class= $data['data']['input-size'];

}
//dd($data);

?>


<div class="form-group {{ $class }}">
@if($data['lable'] !=' ' )
{{ Form::label($data['name'], $data['vName']) }} 
@endif
<div class="checkbox">
@foreach($data['dataArray'] as $value=>$lable)
<label tabindex="{{$index}}">
	@if(array_key_exists('UniqId2',$lable))
	{{Form::checkbox($data['name']."[".$lable['UniqId1']."]"."[".$lable['UniqId2']."]")}}
	@else
	{{Form::checkbox($data['name']."[".$lable['UniqId1']."]")}}
	@endif
    {{$lable['name']}}
  </label>
@endforeach
</div>
</div>
