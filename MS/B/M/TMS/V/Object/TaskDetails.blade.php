<div class="panel panel-info" >
      <?php 

      $userRole=0;
              if(session('user.SuperAdmin')){
                      $userRole=1;
                      }elseif (session('user.AgencyAdmin')) {
                      $userRole=2;
                      }else{
                      $userRole=0;
                      }
                      ?>
                    
                        <div class="panel-heading text-capitalize"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Task No. {{  $data['task']['UniqId'] }}
                        

                        </div>
                      
                        <div class="panel-body" >

                          <span class="col-lg-12">

      </span>
                        <table class="table table-bordered text-capitalize">
							
              <tr>

              
                <th>Task No </th>
                <td>: {{$data['task']['UniqId']}}</td>

               
              </tr> 


                <tr>

               
                
                <th>Assined Agency  </th>
                <td>: {{\B\AMS\Logics::getAgencyName($data['task']['HireAgencyCode'])}}</td>

               
              </tr>  




							<tr>
								
								<th>Name of Operator</th>
								<td>: {{$data['task']['NameOperator']}}</td>

               
							</tr>   


              <tr>
                 <?php

                //dd($data);
                 ?>
                <th>Location of Control Room</th>
                <td>: </td>

              </tr>                     	

							<tr>
								
								<th>Area of Piracy</th>
								<td>: {{$data['task']['AreaPiracy']}}</td>

              
							</tr>   



                <tr>
                
                <th>Illegal broadcasting </th>
                <td>: {{$data['task']['IllegalTypeBroadcasting']}}</td>

              
              </tr>    



                <tr>
                
                <th>Status of Operator </th>
                <td>: {{$data['task']['StatusOperator']}} of {{$data['task']['NameOfNetwork']}}</td>

              
              </tr>  


                 <tr>
                
                <th>Mode of Piracy </th>
                <td>: {{$data['task']['ModePiracy']}} of {{$data['task']['NameOfNetwork']}}</td>

              
              </tr>  





                                 	


                        </table>


              <h5>Task Current Status</h5>
              <table class="table table-bordered text-capitalize">
                
              <th> No. </th>
              <th> Type of Action</th>
              <th> Action Taken by </th>
              <th>Documents</th>
              <th>Action</th>
              <th> Date </th>

              @foreach($data['taskDetaisls'] as $step)
              <tr>
                
                
                <td>{{$loop->iteration}}</td>
                <td> {{ \B\TMS\Logics::getTypeOfAction($step['TypeOfAction'])['NameOfAction'] }} </td>

                @if(\B\Users\Logics::getUserName($step['TakenBy']))


                <td> {{ \B\Users\Logics::getUserName($step['TakenBy'])  }} ( Admin )</td>


                @elseif(\B\AMS\Logics::getUserName($step['TakenBy']))

                <td> {{ \B\AMS\Logics::getUserName($step['TakenBy']) }} ( Agency )  </td>

                @else

                <td> No Data Found  {{ $step['TakenBy'] }} </td>
                @endif


                <td>
                @if($step['DocumentUploaded'])

                <?php
                
                $documentArray=(array)json_decode($step['DocumentArray']);
                $documenyArrayVeri=(array)json_decode($step['DocumentVerifiedArray']);
                

                 ?>


   
              <table class="table table-bordered text-capitalize">

                
                 @foreach($documentArray as $docName=>$docPath )
                 
                 <tr>
                  <?php
                  $docPath=(array)$docPath;

                  $url=str_replace('\\' ,'/',$docPath['path']);
                  $urlArray=explode('/',$url);
                  $c=\MS\Core\Helper\Comman::random(2);
                  array_splice($urlArray, 1, 0, $c);
                  $url=implode('/', $urlArray);
                  

                 //;
                 // if('Panchnma Copy_452'==explode('.',$docName)[0])dd($docPath);
                   ?>
                  
                  
                  <td>
<a href="{{ \Storage::disk('ATMS')->url($url) }}" target="_BLANK">
                 {{ explode('.',$docName)[0] }}
               </a>
               </td>
               @if(array_key_exists('DateOfDocument', $docPath) && ($docPath['DateOfDocument']!=null))
           
               <td>
                 
                 {{ $docPath['DateOfDocument'] }}
               </td> 

                @endif

                   @if(array_key_exists('NoOfDocument', $docPath)  && ($docPath['NoOfDocument']!=null))
               <td>
                 
                 Invoice No.{{ $docPath['NoOfDocument'] }}
               </td> 

                @endif

                @if(array_key_exists('AmountOfDocument', $docPath)  && ($docPath['AmountOfDocument']!=null))
               <td>
                 
                Total Amount: ₹ {{ $docPath['AmountOfDocument'] }}
               </td> 

                @endif
               </tr>
                
                 @endforeach
               
               </table>
              








                 @else

                 No Document Uploaded

                @endif
                </td>


                <td>
                  

               @if($step['DocumentVerified'])
                  
                  <div class="ms-text-white label label-success "> <i class="fa fa-check"></i> Verified by 


                     @if(\B\Users\Logics::getUserName($step['VerifiedBy']))


              {{ \B\Users\Logics::getUserName($step['VerifiedBy'])  }} ( Admin )


                @elseif(\B\AMS\Logics::getUserName($step['VerifiedBy']))

              {{ \B\AMS\Logics::getUserName($step['VerifiedBy']) }} ( Agency ) 

                @else

           No Data Found  {{ $step['VerifiedBy'] }} 
                @endif

                    </div>

               @else

               @if($step['DocumentUploaded'])
               <div class="btn-group btn-group-xs">
                 
                <div class="btn btn-info ms-text-black" ms-live-link="{{  route('TMS.Task.Approve.Id',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['task']['UniqId']) ,'StepId'=>\MS\Core\Helper\Comman::en4url($step['UniqId']) ] ) }}">
                  <i class="fa fa-check"></i>
                  Approve
                </div>

                <div class="btn btn-danger ms-text-white">
                  <i class="fa fa-question"></i>
                  Rise Query
                </div>

               </div>
               @else

                 No Document Uploaded

                @endif

               @endif 


                </td>

                <td> {{ \Carbon::parse($step['created_at'])->format('d/m/Y') }}  </td>


              </tr>



              @endforeach

              </table>
                    



                </div>

                <div class="panel-footer">
                  

                     <div class="btn-group btn-group-justified" >
                              
                      <?php 
                   //   dd(session()->all());
                      if(session('user.SuperAdmin')){
                      $link="TMS.Task.View";
                      }elseif (session('user.AgencyAdmin')) {
                      $link="ATMS.Task.Upload.Id";
                      }else{
                      $link=null;
                      }

                 

                      ?>  


                        @if($userRole==1)

                              <div class="btn btn-default ms-text-black ms-mod-btn" ms-live-link="{{ route($link) }}"><i class="fa fa-fast-backward"  ></i> Go Back to Task List</div>
                        @elseif($userRole==2)

                        <div class="btn btn-info ms-text-black ms-mod-btn " ms-live-link="{{ route('ATMS.index.Data') }}"><i class="fa fa-fast-backward"  ></i> Go Back to Task List</div>
                         <div class="btn ms-text-black ms-mod-btn btn-success" ms-live-link="{{ route($link, 

                         ['UniqId'=>\MS\Core\Helper\Comman::en4url($data['task']['UniqId']) ] ) }}"><i class="fa fa-cloud-upload"  ></i> Upload Documents</div>

                        @endif                           

                            </div>

                </div>
                </div>


    
