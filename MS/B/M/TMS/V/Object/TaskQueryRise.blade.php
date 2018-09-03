<?php
 

  $data['form-action-para']=[


    'TaskId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']),
    'StepId'=>\MS\Core\Helper\Comman::en4url($data['StepId']),


    ];
    $data['form-action']=route('TMS.Task.Rise.Step.Query.Post',$data['form-action-para']);

    

    //dd($data);

 ?>


<div class="panel panel-info" >


      {!! Form::open(['url' => $data['form-action'],'method' => 'post','files' => true,'class'=>'ms-form ','role'=>'form']) !!}
     

<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> Rise Query for Task No.{{$data['TaskId']}} for Step No.{{$data['StepId']}} </strong></h5></div>
<div class="panel-body">
  

  <span class="col-lg-12">
    
        @include('B.L.Object.Error')
      </span>
</div>


  <table class="table table-bordered text-capitalize">


  <tr>
  	<th>Document Name</th>
  	<th>Type of Document</th>
  	<th>Document Details</th>

    <th>Document Query</th>
  	

  </tr>


  @foreach($data['stepData']['DocumentArray'] as $docName=>$docDetails)
  <?php 

  //dd($docDetails);
  $dataForCheckBox=[
'lable'=>' ',

'name'=>'SelectedFiles',
'dataArray'=>[  $docDetails['UniqId'] =>explode('.',$docName)[0]],



  ];
  //\Form::inputCheck($dataForCheckBox,$loop->iteration);

 // dd($data);
  ?>




  <tr >
  		
  		<td>  {{\Form::inputCheck($dataForCheckBox,$loop->iteration)}}</td>
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
                  //dd();  

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


  <?php 



  $dataFortextarea=[
'lable'=>'Write your query here',

'name'=>'SelectedFilesQuery['.$docPath['UniqId'].']',
'value'=>'',
'data'=>['input-size'=>'col-lg1-12'],
  ];


  ?>

       <td>  {{\Form::inputTextArea($dataFortextarea,$loop->iteration+1)}} </td>

  </tr>

  @endforeach




  </table>

<div class="panel-footer">
	


	<div class="btn-group btn-group-justified" >
                              
                      <?php 
             
                      $link="TMS.Task.View.Id";
                   

                 

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