<div class="panel panel-info" >
                      <?php 

                 //    dd($data);

                      ?>  
                        <div class="panel-heading"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Agency No. {{  $data['agency']['UniqId'] }}
                     

                        </div>
                      
                        <div class="panel-body" >

                        <table class="table table-bordered">
							
							<tr>
								
								<th>Name:</th>
								<td>{{$data['agency']['Name']}}</td>
							</tr>                        	

							<tr>
								
								<th>Address:</th>
								<td>{{$data['agency']['AddressLine1']}},<br>{{$data['agency']['AddressLine2']}},<br>{{$data['agency']['AddressLine3']}},<br>{{$data['agency']['City']}}</td>
							</tr>                        	


                        </table>



                   



                </div>

                <div class="panel-footer">
                  

                     <div class="btn-group btn-group-xs btn-group-justified" >
                              


                              <div class="btn btn-default ms-text-black ms-mod-btn" ms-live-link="{{ route('AMS.Agency.View') }}"><i class="fa fa-arrow-left"  ></i> Go Back to Agency List</div>
                              <div class="btn btn-info ms-text-black ms-mod-btn" ms-live-link="{{ route('AMS.Agency.LoginAsAdmin.Id',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['agency']['UniqId'])]) }}"><i class="fa fa-sign-in"  ></i><br> Login as Agency</div>
                           
                              <div class="btn btn-success ms-text-black ms-mod-btn" ms-live-link="{{ route('AMS.Agency.Edit.Id',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['agency']['UniqId'])]) }}"><i class="fa fa-pencil"  ></i><br>Edit</div>
                              <div class="btn btn-danger ms-text-black ms-mod-btn ms-btn-confirm" ms-live-link="{{ route('AMS.Agency.Delete.Id',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['agency']['UniqId'])]) }}"><i class="fa fa-trash"></i><br>Delete</div>

                            </div>

                </div>
                </div>


    
