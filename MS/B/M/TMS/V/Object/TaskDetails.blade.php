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
                    
                        <div class="panel-heading text-capitalize"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Task. {{  $data['task']['UniqId'] }}
                        

                        </div>
                      
                        <div class="panel-body" >

                          <span class="col-lg-12">

      </span>
                        <table class="table table-bordered text-capitalize">
							
							<tr>
								
								<th>Name of Operator:</th>
								<td>{{$data['task']['NameOperator']}}</td>

               
							</tr>                        	

							<tr>
								
								<th>Area of Piracy:</th>
								<td>{{$data['task']['AreaPiracy']}}</td>

              
							</tr>                        	


                        </table>


              <h5>Task Current Status</h5>
              <table class="table table-bordered text-capitalize">
                
              <th> No. </th>
              <th> Type of Action</th>
              <th> Action Taken by </th>
              <th> Date </th>

              @foreach($data['taskDetaisls'] as $step)
              <tr>
                

                <td>{{$loop->iteration}}</td>
                <td> {{ \B\TMS\Logics::getTypeOfAction($step['TypeOfAction'])['NameOfAction'] }} </td>
                <td> {{ \B\Users\Logics::getUserName($step['TakenBy']) }} </td>
                <td> {{ \Carbon::parse($step['created_at'])->format('d/m/Y') }}  </td>


              </tr>



              @endforeach

              </table>
                    



                </div>

                <div class="panel-footer">
                  

                     <div class="btn-group btn-group-xs btn-group-justified" >
                              
                      <?php 
                   //   dd(session()->all());
                      if(session('user.SuperAdmin')){
                      $link="TMS.index.Data";
                      }elseif (session('user.AgencyAdmin')) {
                      $link="ATMS.Task.Upload.Id";
                      }else{
                      $link=null;
                      }

                      ?>  


                        @if($link!=null)

                              <div class="btn btn-default ms-text-black ms-mod-btn" ms-live-link="{{ route('ATMS.index.Data') }}"><i class="fa fa-arrow-left"  ></i> Go Back to Task List</div>
                        @endif

                        @if($userRole==2)

                         <div class="btn btn-default ms-text-black ms-mod-btn btn-info" ms-live-link="{{ route($link, 

                         ['UniqId'=>\MS\Core\Helper\Comman::en4url($data['task']['UniqId']) ] ) }}"><i class="fa fa-cloud-upload"  ></i> Upload Documents</div>

                        @endif                           

                            </div>

                </div>
                </div>


    
