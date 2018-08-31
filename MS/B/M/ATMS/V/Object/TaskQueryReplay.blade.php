<?php
 

  $data['form-action-para']=[


    'TaskId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']),
    'StepId'=>\MS\Core\Helper\Comman::en4url($data['StepId']),


    ];
    $data['form-action']=route('ATMS.Task.Rise.Step.Replay.Post',$data['form-action-para']);

      $docArray=current(current($data['stepData']['DocumentQueryArray']));

   // dd($data);

 ?>


<div class="panel panel-info" >


      {!! Form::open(['url' => $data['form-action'],'method' => 'post','files' => true,'class'=>'ms-form ','role'=>'form']) !!}
     

<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> Replay Query for Task No.{{$data['TaskId']}} for Step No.{{$data['StepId']}} </strong></h5></div>
<div class="panel-body">
  

  <span class="col-lg-12">
    
        @include('B.L.Object.Error')
      </span>
</div>


  <table class="table table-bordered text-capitalize">
<tr>
  
  <th> Query From admin </th>
  <td colspan="2">: {{ $docArray['Query']  }} </td>
</tr>

  <tr>
  	<th>Upload file to Replace</th>
  	<th>Type of Document</th>
  	<th>Document Details</th>
  	

  </tr>




  @foreach($docArray['QueryDocumentArray'] as $docName=>$docDetails)
  <?php 

  //  dd($docDetails);
  $dataForCheckBox=[
'lable'=>'Select File',

'name'=>'replaceFiles['.$docDetails['UniqId'].']',
//'dataArray'=>[  $docDetails['UniqId'] =>explode('.',$docName)[0]],



  ];
  //\Form::inputCheck($dataForCheckBox,$loop->iteration);

 // dd($data);
  ?>




  <tr >
  		
  		<td>  {{\Form::inputFile($dataForCheckBox,$loop->iteration)}}</td>
  		<td> {{\B\ATMS\Logics::getTypeOfDocument($docDetails['TypeOfDocument']) ['NameOfDocuments']}}</td>

      <td> 

                     <table class="table table-bordered text-capitalize table-responsive table-condensed">

                
            
                 <tr>
                  <?php
                  $docPath=(array)$docDetails;

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
<a href="{{ route('ATMS.Task.Get.File.Name',['UniqId'=>\MS\Core\Helper\Comman::en4url($c),'TaskId'=>\MS\Core\Helper\Comman::en4url($data['taskData']['UniqId']),'StepId'=>\MS\Core\Helper\Comman::en4url($data ['StepId']),'TypeOfDocument'=>\MS\Core\Helper\Comman::en4url($docPath['TypeOfDocument']),'FileName'=>$docDetails['FileName']]) }}" target="_BLANK">
                 {{ explode('.',$docDetails['FileName'])[0] }}
               </a>
               </td>
               @if(array_key_exists('DateOfDocument', $docPath) && ($docPath['DateOfDocument']!=null))
           
               <td>
                 
                 {{ Carbon::parse($docPath['DateOfDocument'])->format('d / m / Y') }}
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

  </tr>

  @endforeach

  <?php 

  $dataFortextarea=[
'lable'=>'Write your query here',

'name'=>'ReplayFromAgency',
'value'=>'',

  ];


  ?>

  <tr>
  	<td colspan="4">  {{\Form::inputTextArea($dataFortextarea,'100')}} </td>

  </tr>

  </table>

<div class="panel-footer">
	


	<div class="btn-group btn-group-justified" >
                              
                      <?php 
             
                      $link="ATMS.Task.View.Id";
                   

                 

                      ?>  

					 <div class="btn btn-default ms-text-black ms-mod-btn" ms-live-link="{{ route($link,['UniqId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']) ]) }}"><i class="fa fa-fast-backward"  ></i> Go Back to Task Overview No. {{$data['TaskId']}}</div>
           
           <div class="btn btn-success ms-text-black btn-frm-submit" > Submit Query <i class="fa fa-paper-plane-o"  ></i></div>
                

                            </div>
</div>


    {!! Form::close() !!}

  </div>


  <script type="text/javascript">


  @include('L.jsFix')

  </script>