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
    <div class="container-fluid align-center">
        <div class="row justify-content-md-center">

                 <div class=" col-md-2 visible-lg" style="position: fixed;left:0;top:90px;right:0; ">
<!--                             <div class=" col-md-2 navbar-fixed-top" > -->

         <div class="panel panel-success">
             <div class="panel-heading"> <span class="mbri-help"></span> News</div>
             <div class="panel-body">Demo</div>

         </div>

        </div>

            <div class="mbr-white col-md-6">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1"><small>{{$company['NameOfBussiness']}}, </small><br>A Non Equity - Non Profit entity</h1>
                
                <p class="mbr-text pb-3 mbr-fonts-style display-7">
                    based on cooperative principles with corporate culture of management, was formed with an objective of providing a Comprehensive Environment Management Program (CEMP) for the estate.<br><br>VGEL set up a common solid waste management site in 1999 and in year 2000, commissioned first cell of Secured Landfill Constructed as per German Design based on asphalt-concrete base liners.&nbsp;<br><br>
                    We have installed end of the pipeline treatment facilities like common effluent treatment plant (CETP) and transport, storage, disposal facility for hazardous solid waste (TSDF) to control pollution levels and now focus is shifted to pollution abatement by adopting and promoting Cleaner Production, Cleaner Technology for Cleaner Development Mechanism.
                </p>
                <div class="mbr-section-btn"><a class="btn btn-md btn-primary display-4" href="{{route('HM.AboutUs')}}">LEARN MORE</a></div>
            </div>

  <div class=" col-md-2 visible-lg" style="position: fixed;top:90px;right:0px;float: right; ">
<!--                             <div class=" col-md-2 navbar-fixed-top" > -->

         <div class="panel panel-success">
             <div class="panel-heading"> <span class="mbri-bookmark"></span> Tenders</div>
             <div class="panel-body">Demo</div>

         </div>

        </div>




        </div>






    </div>



   
    
</section>

@endsection