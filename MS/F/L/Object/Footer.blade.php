<section class="cid-qTkAaeaxX5 mbr-reveal mbr-parallax-background " id="footer1-2">

    <?php

   $company=\B\MAS\Model::getCompany();
  // dd($company)


     ?>

    <div class="mbr-overlay" style="background-color: rgb(35, 35, 35); opacity: 1;"></div>


        <div class="media-container-row content text-white footer-fix" >

 
            <div class="col-12 col-md-3">
                <div class="media-wrap">
                    <a href="{{action('\F\HM\Controller@index')}}">
                        <img src="assets/images/logo-1-999x165.jpg" alt="Mobirise" title="">
                       <p class="mbr-text">
                        {{$company['NameOfBussiness']}}
                        <br><small>CIN: {{$company['CinNo']}}</small>
                    </p>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">Address</h5>
                <p class="mbr-text">{{$company['AddressStreet']}}
                    <br>{{$company['AddressRoad']}}
                    <br>{{$company['AddressCity']}} - {{$company['Pincode']}}
                    
                </p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">Contact Us</h5>
                <p class="mbr-text">

                    Email: {{$company['Email']}}
                    <br>Phone: {{$company['ContactNo']}}
                    <br>Fax: {{$company['FaxNo']}}
                </p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7" >
                <h5 class="pb-3">Links</h5>
           
                        
                        <ol class="links" style="font-size: 12px; list-style-type: none; padding-left: 0px;">
                                    <li class="link "><a href="http://www.cpcb.nic.in" target="_blank">Central Pollution Control Board(CPCB)</a></li>
                                            <li class="link "><a href="http://www.gpcb.gov.in" target="_blank" > Gujarat Pollution Control Board(GPCB)</a></li>
                                            <li class="link "><a href="http://www.gidc.gujarat.gov.in" target="_blank">Gujarat Industrial Development Corporation (GIDC)</a></li>
                                            <li class="link "><a href="http://www.gcpcgujarat.org.in" target="_blank">Gujarat Cleaner Production Centre(GCPC)</a></li>
                                            <li class="link "><a href="http://www.coevapi.com" target="_blank">Centre Of  Excellence(COE)</a></li>
                                            <li class="link "><a href="http://www.viavapi.org" target="_blank">Vapi Industries Association(VIA)</a></li>
                                            <li class="link "><a href="http://www.envfor.nic.in" target="_blank">Ministry of Environment, Forest and Climate Change (MoEF)</a></li>
                                    </ol>



            </div>




        </div>


        <div class="footer-lower " style="">
            <div class=" ">
                <div class="col-sm-12 ">
                    <hr style="opacity: 1">
                </div>


            


            </div>


            <div class="footer-fix" >
                <div class="col-sm-6 mbr-white mbr-fonts-style display-7  ms-xs-sm-text-left ms-xs-sm-text-center">
                    © {{ Carbon::now()->year - 1  }} - {{ Carbon::now()->year }} Copyright {{$company['NameOfBussiness']}} All Rights Reserved.
                </div>
                <div class="col-sm-6 mbr-white  mbr-fonts-style display-7  ms-xs-sm-text-right ms-xs-sm-text-center">
                   MS-Flex ™ Solution Provided by <a href="https:/www.millionsllp.com" target="_blank"> Million Solutions LLP</a> 
                </div>

            </div>
        <!--     <div class="container" style="padding-left:250px;padding-right:250px;">
                <div class="copyright">
                    <div class="mbr-text mbr-white mbr-fonts-style display-7">
                            
                      <span class="">© {{ Carbon::now()->year - 1  }} - {{ Carbon::now()->year }} Copyright {{$company['NameOfBussiness']}} All Rights Reserved.<br>
                       <i class="text-right"> MS-Flex ™ Solution Provided by <a href="https:/www.millionsllp.com" target="_blank"> Million Solutions LLP</a>    </i>
                        </span>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div> -->
        </div>
  

</section>