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


	@if(array_key_exists('link',$data))


	<?php

	

	$class="\\B\\".$data['link']['mod']."\\Model";

	$class=new $class ();


    if(substr($data['name'], -1) == ']'){

    	$data['funName']=substr($data['name'], 0, -2);

    }else{

    	$data['funName']=$data['name'];


    }
	//$data['vName']=$data['name'];
    if(array_key_exists('funName', $data))
    {
    	$function="get".$data['funName'];
     	$dlist=$class->$function ();

	

    
    }



	?>


@if(isset($dlist))

<datalist id="{{$data['name']}}List">
	@foreach($dlist as $value=>$key)
 <option value="{{$value}}"> {{$key}}</option>

	@endforeach

	
	</datalist>

@endif
	@endif





{{ Form::label($data['name'], $data['vName']) }}
    
@if(array_key_exists('editLock',$data))


	@if( $data['editLock']  )


 <fieldset disabled> 
 {{ Form::text($data['name'],$data['value'],['class'=>'form-control','tabindex'=>$index,'readonly','placeholder'=>'Enter '.$data['vName']] ) }}
 </fieldset>



	{{Form::hidden($data['name'], $data['value'])}}

@endif	


@else






      {{ Form::text($data['name'], $data['value'],['class'=>'form-control','list'=>$data['name'].'List','tabindex'=>$index,'placeholder'=>'Enter '.$data['lable'], 
    
    ]
     ) }}


@endif	

</div>
