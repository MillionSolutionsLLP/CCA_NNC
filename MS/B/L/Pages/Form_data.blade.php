
<div class="panel panel-default">

<?php// dd($data);?>
	<div  class="panel-heading"><h5 class=""> <strong><i class="glyphicon glyphicon-chevron-right"></i> {{$data['form-title']}}</strong> </h5></div>


			@if(array_key_exists('form-action-para',$data))

			{!! Form::open(['action' => [$data['form-action'],$data['form-action-para']],'method' => 'post','files' => true,'class'=>'ms-form ','role'=>'form']) !!}
			@else
			{!! Form::open(['action' => $data['form-action'],'method' => 'post','files' => true,'class'=>'ms-form ','role'=>'form']) !!}
			@endif
		<div class="panel-body bg-info">
			<span class="col-lg-12">
		
				@include('B.L.Object.Error')
			</span>

			{!! $data['form-content'] !!}
		
		</div>

		<div class="panel-footer bg-info ">
		
			<div class="btn-group btn-group-justified">


				
			@foreach ($data['form-btn'] as $btn)

			
			
			@if(array_key_exists('action',$btn))
			<?php (array_key_exists('action-para', $btn))? $action=action($btn['action'],$btn['action-para']) :   $action=action($btn['action']) ?>

			@if(array_key_exists('data',$btn))
			
			@if(array_key_exists('color',$btn))
			{{ Form::msButton("<i class='".$btn["icon"]." ' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   ms-mod-btn '.$btn['color'].' ms-text-black' , 'ms-live-link'=>$action,] ) }}
			@else
			{{ Form::msButton("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   ms-mod-btn'.' ms-text-black' , 'ms-live-link'=>$action,] ) }}
			@endif


			@else
			
			@if(array_key_exists('color',$btn))
			{{ Form::msButton("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   ms-mod-btn '.$btn['color'].' ms-text-black' , 'ms-live-link'=>$action,] ) }}
			@else
			{{ Form::msButton("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   ms-mod-btn ms-text-black ' , 'ms-live-link'=>$action,] ) }}
			@endif


			@endif

			
			@else

			@if(array_key_exists('color',$btn))
			{{ Form::msButton("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn  btn-frm-submit end-close '.$btn['color'].' ms-text-black'] ) }}
			@else
			{{ Form::msButton("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-success  btn-frm-submit ms-text-black'] ) }}
			@endif
			

			@endif


			@endforeach
			</div>
	
		
		</div>

	
		{!! Form::close() !!}



</div>



<script type="text/javascript">

@if(array_key_exists('form-js',$data))

@foreach($data['form-js'] as $value)

@include($value)

@endforeach

@endif


@include('L.jsFix')


</script>