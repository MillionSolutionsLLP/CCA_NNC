<div class="panel panel-info" >
      <?php 
    //  dd($data);
      $userRole=0;
              if(session('user.SuperAdmin')){
                      $userRole=1;
                      }elseif (session('user.AgencyAdmin')) {
                      $userRole=2;
                      }else{
                      $userRole=0;
                      }

                      //dd($data);
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

              // dd($data);
                  
                  $address='';

                  if($data['task']['NameOperatorAddress1'] != null or  $data['task']['NameOperatorAddress1'] !=' ' )$address.=",".$data['task']['NameOperatorAddress1'];
                  if($data['task']['NameOperatorAddress2'] != null or  $data['task']['NameOperatorAddress2'] !=' ' )$address.=",".$data['task']['NameOperatorAddress2'];
                  if($data['task']['NameOperatorAddress3'] != null or  $data['task']['NameOperatorAddress3'] !=' ' )$address.=",".$data['task']['NameOperatorAddress3'];

                  $address.=$data['task']['NameOperatorCity'].",".$data['task']['NameOperatorDistrict'].",".$data['task']['NameOperatorState']."-".$data['task']['NameOperatorPincode']

                 ?>


                <th>Location of Control Room</th>
   

                <td>: {{$address}}</td>

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
                
                $DocumentQuery=$step['DocumentQuery'];
                $DocumentQueryReplay=$step['DocumentReply'];


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
                 // dd($docPath);  

                 //;
                 // if('Panchnma Copy_452'==explode('.',$docName)[0])dd($docPath);
                   ?>
                  
                  
                  <td>
<a href="{{ route('TMS.Task.Get.File.Name',['UniqId'=>\MS\Core\Helper\Comman::en4url($c),'TaskId'=>\MS\Core\Helper\Comman::en4url($data['task']['UniqId']),'StepId'=>\MS\Core\Helper\Comman::en4url($step['UniqId']),'TypeOfDocument'=>\MS\Core\Helper\Comman::en4url($docPath['TypeOfDocument']),'FileName'=>$docName]) }}" target="_BLANK">
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
                
                <div class="btn-group btn-group-xs">

               @if($step['DocumentVerified'] == 1)
                   <div class="btn btn-success ms-text-white "> <i class="fa fa-check"></i> Verified by 


                        @if(\B\Users\Logics::getUserName($step['VerifiedBy']))



                             {{ \B\Users\Logics::getUserName($step['VerifiedBy'])  }} ( Admin )


                        @elseif(\B\AMS\Logics::getUserName($step['VerifiedBy']))
               
                            {{ \B\AMS\Logics::getUserName($step['VerifiedBy']) }} ( Agency ) 



                        @else

                          No Data Found  {{ $step['VerifiedBy'] }} 
                        @endif





                    </div>

                    @elseif($step['DocumentVerified'] == 3)

                    <div class="btn btn-danger ms-text-white "> <i class="fa fa-times"></i> Rejected by 


                        @if(\B\Users\Logics::getUserName($step['VerifiedBy']))



                             {{ \B\Users\Logics::getUserName($step['VerifiedBy'])  }} ( Admin )


                        @elseif(\B\AMS\Logics::getUserName($step['VerifiedBy']))
               
                            {{ \B\AMS\Logics::getUserName($step['VerifiedBy']) }} ( Agency ) 



                        @else

                          No Data Found  {{ $step['VerifiedBy'] }} 
                        @endif





                    </div>

                  @endif

                  </div>

               @else

               @if($step['DocumentUploaded'])



               <div class="btn-group btn-group-xs">

               @if(!$DocumentQuery)
                 

                <div class="btn btn-info ms-text-black ms-mod-btn" ms-live-link="{{  route('TMS.Task.Approve.Id',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['task']['UniqId']) ,'StepId'=>\MS\Core\Helper\Comman::en4url($step['UniqId']) ] ) }}">
                  <i class="fa fa-check"></i>
                  Approve
                </div>

               @if(!$DocumentQueryReplay)

               
                <div class="btn btn-danger ms-text-white ms-mod-btn" ms-live-link="{{  route('TMS.Task.Rise.Step.Query',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['task']['UniqId']) ,'StepId'=>\MS\Core\Helper\Comman::en4url($step['UniqId']) ] ) }}">
                  <i class="fa fa-question"></i>
                  Rise Query
                </div>


                @else

               

                <div class="btn btn-warning ms-text-black ms-mod-btn" ms-live-link="{{  route('TMS.Task.Rise.Step.Query.View',['TaskId'=>\MS\Core\Helper\Comman::en4url($data['task']['UniqId']) ,'StepId'=>\MS\Core\Helper\Comman::en4url($step['UniqId']) ] ) }}">
                  <i class="fa fa-eye"></i>
                  View Replay
                </div>
                @endif

                @else


                <?php  //dd($step) 

                $step['DocumentQueryArray']=json_decode($step['DocumentQueryArray'],true);
                $step['DocumentArray']=json_decode($step['DocumentArray'],true);

                 ?>

                 @if(count($step['DocumentQueryArray']) != count($step['DocumentArray']))
                  <div class="btn btn-danger ms-text-white ms-mod-btn" ms-live-link="{{  route('TMS.Task.Rise.Step.Query',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['task']['UniqId']) ,'StepId'=>\MS\Core\Helper\Comman::en4url($step['UniqId']) ] ) }}">
                  <i class="fa fa-question"></i>
                  Rise Query
                </div>
                 @endif

                <div class="btn btn-warning ms-text-black" >
                  <i class="fa fa-refresh fa-spin fa-fw"></i>
                  Waiting For Agency Replay
                </div>

                @endif
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
                              <div class="btn btn-danger ms-text-white ms-mod-btn" ms-live-link="{{route('TMS.Task.View')}}"><i class="fa fa-question"></i> Rise Query</div>
                              <div class="btn btn-success ms-text-black ms-mod-btn" ms-live-link="{{route('TMS.Task.View')}}"><i class="fa fa-check"></i> Approve</div>
    
                        @elseif($userRole==2)

                        <div class="btn btn-info ms-text-black ms-mod-btn " ms-live-link="{{ route('ATMS.index.Data') }}"><i class="fa fa-fast-backward"  ></i> Go Back to Task List</div>
                         <div class="btn ms-text-black ms-mod-btn btn-success" ms-live-link="{{ route($link, 

                         ['UniqId'=>\MS\Core\Helper\Comman::en4url($data['task']['UniqId']) ] ) }}"><i class="fa fa-cloud-upload"  ></i> Upload Documents</div>

                        @endif                           

                            </div>

                </div>
                </div>