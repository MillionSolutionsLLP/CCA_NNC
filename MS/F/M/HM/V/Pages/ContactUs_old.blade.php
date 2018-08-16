<?php 

   $company=\B\MAS\Model::getCompany();

?>
@extends('F.L.Plate')
@section('title')
{{$company['NameOfBussiness']}}
@endsection


@section('content')

<section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1" style="padding-top: 77px;">

    
<!-- 
    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(255, 255, 255);"></div>
 -->
    <div class="container-fluid align-left">
        <div class="row justify-content-md-center">

    

            <div class=" col-md-10">
                <h1 class=" mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1"><small>Welcome to, </small><br>{{$company['NameOfBussiness']}}</h1>
                
 <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" ><a sty href="#home" aria-controls="home" role="tab" data-toggle="tab" style="color:#149dcc;">Make a Inquiry</a></li>
    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"style="color:#149dcc">Contacts</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"style="color:#149dcc">Location</a></li>
  </ul>

  <!-- Tab panes -->


  <div class="tab-content"  style="">
    <div role="tabpanel" class="tab-pane " id="home">...</div>
    <div role="tabpanel" class="tab-pane active" id="profile">

<div class="bg-warning" style="display: -webkit-box;padding-top: 12px;" > 
<div class="col-md-3">

<div class="panel panel-default">
    

    <div class="panel-footer">  Corporate Office:</div>
    <div class="panel-body display-6">
        VIA House, Plot No. 135,<br>
        GIDC, Vapi - 396 195<br>
        Gujarat. India<br>
        Tel.: 0260 2428950, 0260 2429950<br>
    </div>


</div>


</div>

 
 <div class="col-md-3">
<div class="panel panel-default">
    

    <div class="panel-footer">  Common Effluent Treatment Plant:</div>
    <div class="panel-body display-6">
        “CETP”, N.H.No.8, Near Damanganga Bridge,<br>
        GIDC, Vapi - 396 195<br>
        Gujarat. India<br>
        Tel.: 0260 2432950, 0260 2434929<br>
    </div>


</div>

 </div>


  <div class="col-md-3">
<div class="panel panel-default">
    

    <div class="panel-footer">  Common Solid Waste Plant:</div>
    <div class="panel-body display-6">
        “CSWP”, Plot 4807 etc. Phase IV,<br>
        GIDC, Vapi - 396 195<br>
        Gujarat. India<br>
        Tel.: 0260 2427950, 0260 2435186, 0260 2990161<br>
    </div>


</div>

 </div>




  <div class="col-md-3">
<div class="panel panel-default">
    

    <div class="panel-footer">  Centre Of Excellence:</div>
    <div class="panel-body display-6">
        Near Water Filtration Plant, 1st Phase,<br>
        Survey No.863, P/864, 735/P,<br>
        GIDC, Vapi - 396 195<br>
        Gujarat. India<br>
        Tel No.: 0260 6453950, 0260 6453050<br>
    </div>


</div>


 </div>


</div>


    </div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>

  </div>

            </div>






        </div>






    </div>



   
    
</section>

@endsection