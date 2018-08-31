<?php
 

  $data['form-action-para']=[


    'TaskId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']),
    'StepId'=>\MS\Core\Helper\Comman::en4url($data['StepId']),


    ];
    $data['form-action']=route('TMS.Task.Rise.Step.Query.Post',$data['form-action-para']);

    $replayData=current($data['stepData']['DocumentReplyArray']);


//dd($data);
   

 ?>


<div class="panel panel-info" >


      
     

<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> View Query Replay from Agency for Task No.{{$data['TaskId']}} for Step No.{{$data['StepId']}} </strong></h5></div>
<div class="panel-body">
  

  <span class="col-lg-12">
    
        @include('B.L.Object.Error')
      </span>
</div>


  <table class="table table-bordered text-capitalize">

<tr>
  
  <td>Replay From Agency</td>
  <td>: {{ $replayData['Replay']  }}</td>

</tr>

  <tr>
   
    <th>Type of Document</th>
    <th>New Document Details</th>

     <th>Old Document Details</th>
    

  </tr>


  @foreach($data['stepData']['DocumentArray'] as $docName=>$docDetails)




  <tr >
      
     
      <td> {{\B\ATMS\Logics::getTypeOfDocument($docDetails['TypeOfDocument']) ['NameOfDocuments']}}</td>

      <td> 

                     <table class="table table-bordered text-capitalize">

                
            
                 <tr>
                  <?php
                  $docPath=(array)$docDetails;

                  $url=str_replace('\\' ,'/',$docPath['path']);
                  $urlArray=explode('/',$url);
                  $c=\MS\Core\Helper\Comman::random(2);
                  array_splice($urlArray, 1, 0, $c);
                  $url=implode('/', $urlArray);
              //  dd(explode('.',$$docDetails)[1]);  

                 //;
                 // if('Panchnma Copy_452'==explode('.',$docName)[0])dd($docPath);
                   ?>
                  

                  
                  <td>


<a href="{{ route('TMS.Task.Get.File.Name',['UniqId'=>\MS\Core\Helper\Comman::en4url($c),'TaskId'=>\MS\Core\Helper\Comman::en4url($data['taskData']['UniqId']),'StepId'=>\MS\Core\Helper\Comman::en4url($data ['StepId']),'TypeOfDocument'=>\MS\Core\Helper\Comman::en4url($docPath['TypeOfDocument']),'FileName'=>$docName]) }}" target="_BLANK">
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
                
             
               
               </table>

       </td>


       @if(array_key_exists('oldpath', $docDetails)   )      

             <td> 

                     <table class="table table-bordered text-capitalize">

                
            
                 <tr>
                  <?php
                  $docPath=(array)$docDetails;

                  $url=str_replace('\\' ,'/',$docPath['path']);
                  $urlArray=explode('/',$url);
                  $c=\MS\Core\Helper\Comman::random(2);
                  array_splice($urlArray, 1, 0, $c);
                  $url=implode('/', $urlArray);
             //  dd($docDetails);  

                 //;
                 // if('Panchnma Copy_452'==explode('.',$docName)[0])dd($docPath);
                   ?>



         
                  
   <td>

<a href="{{ route('TMS.Task.Get.File.Name',['UniqId'=>\MS\Core\Helper\Comman::en4url($c),'TaskId'=>\MS\Core\Helper\Comman::en4url($data['taskData']['UniqId']),'StepId'=>\MS\Core\Helper\Comman::en4url($data ['StepId']),'TypeOfDocument'=>\MS\Core\Helper\Comman::en4url($docPath['TypeOfDocument']),'FileName'=>explode('.',$docName)[0].'_old.'.explode('.',$docDetails['oldpath'])[1] ]) }}" target="_BLANK">
                 {{ explode('.',$docName)[0] }}_old
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
                
             
               
               </table>

       </td>

       @endif

  </tr>

  @endforeach

 

  </table>

<div class="panel-footer">
  


  <div class="btn-group btn-group-justified" >
                              
                      <?php 
             
                      $link="TMS.Task.View.Id";
                   

                 

                      ?>  

           <div class="btn btn-default ms-text-black ms-mod-btn" ms-live-link="{{ route($link,['UniqId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']) ]) }}"><i class="fa fa-fast-backward"  ></i> Go Back to Task Overview No. {{$data['TaskId']}}</div>
           


<div class="btn btn-success ms-text-black ms-mod-btn" ms-live-link="{{ 


route('TMS.Task.Approve.Id',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']) ,'StepId'=>\MS\Core\Helper\Comman::en4url($data['StepId']) ] )
 }}"><i class="fa fa-check"  ></i> Approve Documents</div>
           
           <div class="btn btn-danger ms-text-black ms-mod-btn" ms-live-link="{{ route('TMS.Task.Rise.Step.Query.Rejected.Id',['TaskId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']),'StepId'=>\MS\Core\Helper\Comman::en4url($data['StepId']) ]) }}"><i class="fa fa-times"  ></i> Reject Documents</div>
           
         
                

                            </div>
</div>




  </div>


  <script type="text/javascript">


  @include('L.jsFix')

  </script>