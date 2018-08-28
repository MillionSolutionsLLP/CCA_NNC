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
<div class="panel-body"></div>


  <table class="table table-bordered text-capitalize">


  <tr>
  	<th>Document Name</th>
  	<th>Type of Document</th>
  	<th>Document Details</th>
  	

  	<th>Action</th>
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

  ?>



  <tr >
  		
  		<td>  {{\Form::inputCheck($dataForCheckBox,$loop->iteration)}}</td>
  		<td> {{\B\ATMS\Logics::getTypeOfDocument($docDetails['TypeOfDocument']) ['NameOfDocuments']}}</td>

  </tr>

  @endforeach

  <?php 

  $dataFortextarea=[
'lable'=>'Write your query here',

'name'=>'SelectedFilesQuery',
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