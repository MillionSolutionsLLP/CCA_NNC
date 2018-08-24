
@if(array_key_exists('ms-live-link',$attributes))

<div class="{{$attributes['class']}}"  ms-live-link="{{$attributes['ms-live-link']}}"> {!!$name!!}  </div>

@else
<div class="{{$attributes['class']}}" > {!!$name!!}  </div>
@endif