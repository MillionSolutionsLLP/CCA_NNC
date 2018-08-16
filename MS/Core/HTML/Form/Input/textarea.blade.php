<?php

if(array_key_exists('index', $data))$index=(string)$data['index'];

if(!array_key_exists('vName', $data))$data['vName']=$data['lable'];

?>

<div class="form-group col-lg-6">
    {{ Form::label($data['name'], $data['vName']) }}
    {{ Form::textarea($data['name'], $data['value'],['class'=>'form-control','tabindex'=>$index,'placeholder'=>'Enter '.$data['vName']] ) }}
</div>