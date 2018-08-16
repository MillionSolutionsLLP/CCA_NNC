<?php 

   $company=\B\MAS\Model::getCompany();

?>
@extends('F.L.Plate')
@section('title')
{{$company['NameOfBussiness']}}
@endsection


@section('content')
 
<section class="cid-qVVubXL42B tabs4 mbr-fullscreen mbr-parallax-background" id="tabs4-b" style="padding-top: 77px;padding-bottom: 20px;background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url({{asset('images/bg.png')}}); ">
 
  <div class="container" style="">
       

            <div class="media-container-row mt-5 pt-3">
                <div class="mbr-figure col-md-7" >
                    <img src="{{ asset('images/contact-us.png') }}" alt="Mobirise" title="">
                </div>
                <div class="tabs-container col-md-7" style="background-color: #E0E0E0;">
                     <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
         Welcome to,<br>{{$company['NameOfBussiness']}}
            </h2>
                    <ul class="nav nav-tabs" role="tablist" style="padding-top: 10px;">
                        <li class="nav-item align-center"><a class="nav-link mbr-fonts-style display-5 active show" role="tab" data-toggle="tab" href="#tabs4-b_tab0" aria-selected="true">
                                <i class="fa fa-question-circle-o" aria-hidden="true"></i> <br> Make a Inquiry
                            </a></li>
                        <li class="nav-item align-center"><a class="nav-link mbr-fonts-style display-5" role="tab" data-toggle="tab" href="#tabs4-b_tab1" aria-selected="false">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i> <br>Contacts Us</a></li>
                        <li class="nav-item align-center"><a class="nav-link mbr-fonts-style display-5" role="tab" data-toggle="tab" href="#tabs4-b_tab2" aria-selected="false">
                                <i class="fa fa-map-marker" aria-hidden="true"></i><br>Locate Us</a></li>



                    </ul>
                    <div class="tab-content">
                        <div id="tabs4-b_tab0" class="tab-pane in active show" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                  
                                    @include("HM.V.Object.ContactForm")

                         



                               
                                </div>
                            </div>
                        </div>
                        <div id="tabs4-b_tab1" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12" style="padding-top: 10px;">
                                    @include("HM.V.Object.OfficialAddress")
                                </div>
                            </div>
                        </div>
                        <div id="tabs4-b_tab2" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12" style="padding-bottom: 15px;">
                                   @include("HM.V.Object.Map")
                                </div>
                            </div>
                        </div>
                        <div id="tabs4-b_tab3" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mbr-text py-5 mbr-fonts-style display-7">
                                        Sites made with Mobirise are 100% mobile-friendly according the latest Google Test and Google loves those websites (officially)!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="tabs4-b_tab4" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mbr-text py-5 mbr-fonts-style display-7">
                                        Mobirise themes are based on Bootstrap 3 and Bootstrap 4 - most powerful mobile first framework. Now, even if you're not code-savvy, you can be a part of an exciting growing bootstrap community.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="tabs4-b_tab5" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mbr-text py-5 mbr-fonts-style display-7">
                                        Choose from the large selection of latest pre-made blocks - full-screen intro, bootstrap carousel, content slider, responsive image gallery with lightbox, parallax scrolling, video backgrounds, hamburger menu, sticky header and more.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

  
</section>

@endsection