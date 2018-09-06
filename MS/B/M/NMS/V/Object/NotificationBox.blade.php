<?php


		\MS\Core\Helper\Comman::DB_flush();
	$m1=new \B\NMS\Model(3,(string)session('user.userData.UniqId'));
	//dd($m1->MS_all());
	$n=$m1->where('Read',0)->get();
?>



@if(!(count($n) > 0))

<li style="padding:5px;" class="ms-mod-btn list-group-item-danger"> No New Notification </li>

@elseif(count($n) > 0)
@foreach($n as $noti)


<?php 
//dd($noti)

 $read="";
if(!$noti['Read']){

$read='ms-text-bold list-group-item-warning';
}

?>


<li  style="padding:5px;" class="ms-mod-btn list-group-item-info  {{ $read}}" ms-live-link="{{ $noti['NotificationLink'] }}">
@if(!$noti['Read'])
<i class="fa fa-dot-circle-o"  aria-hidden="true"></i> 
@endif
 {{$noti['TextOfNotification']}}</li>


@endforeach

@else

<li  style="padding:5px;" class="ms-mod-btn list-group-item-danger"> No New Notification </li>


@endif


<li  style="padding:5px;" class="ms-mod-btn list-group-item-info text-right" ms-live-link="{{ route('NMS.index.Data') }}">View All Notification </li>
