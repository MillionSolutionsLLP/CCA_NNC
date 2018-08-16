
<div class="col-lg-6">

<?php

//dd($data);
if(!array_key_exists('vName', $data))$data['vName']=$data['lable'];

//if(array_key_exists('editLock', $data))var_dump($data);

//if($data['vName'] =='Warehouse')dd($data);
if(array_key_exists('index', $data))$index=(string)$data['index'];


?>


{{ Form::label($data['name'], $data['vName'],['class'=>'col-md-4']) }}

<div class="form-group">

 <div class="input-group">

      {{ Form::password($data['name'],['class'=>'form-control col-md-8','tabindex'=>$index,'placeholder'=>'Enter '.$data['lable'], 
    
    ]
     ) }}

     <div class="input-group-addon btn ms-btn-password-visible "  ms-target="{{$data['name']}}" ><i class="fa fa-eye-slash" id="{{$data['name']}}Icon"></i></div>
     </div>

 </div>

</div>