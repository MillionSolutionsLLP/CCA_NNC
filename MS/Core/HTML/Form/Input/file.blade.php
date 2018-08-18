
<div class="form-group col-lg-6">

<?php 
(array_key_exists('index', $data))?$index=(string)$data['index']:$index=null;

?>

{{Form::label($data['name'], $data['lable'])}}

{{Form::file($data['name'],$data['value'],['class'=>'form-control',] )}}

</div> 