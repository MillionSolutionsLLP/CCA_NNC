<?php
 

  $data['form-action-para']=[


    'TaskId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']),
    'StepId'=>\MS\Core\Helper\Comman::en4url($data['StepId']),


    ];
    $data['form-action']=route('ATMS.Task.Rise.Step.Replay.Post',$data['form-action-para']);

      
    //  $docArray=current(current($data['stepData']['DocumentQueryArray']));

  //dd($data);

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
  	<th>Upload file to Replace</th>
  	<th>Type of Document</th>
  	<th>Document Details</th>
  <th>Document Query</th>
   <th>Document Replay</th>
  	

  </tr>




 @foreach($data['stepData']['DocumentQueryArray']  as $docName=>$docDetails)
  

      @foreach($docDetails  as $docName1=>$docDetails1)



@foreach($docDetails1['QueryDocumentArray']  as $keyDoc=>$query)


<?php
  


    $dataForCheckBox=[
'lable'=>'Select File',

'name'=>'replaceFiles['.$query['UniqId'].']',

];//'

?>
  <tr class="info">
    
   <!--    
       <td>  {{  $data['StepId'] }}</td>    -->   


      <td>  {{\Form::inputFile($dataForCheckBox)}}</td>
<?php  // dd($query);  ?>
      <td> {{\B\ATMS\Logics::getTypeOfDocument( $query ['TypeOfDocument'] ) ['NameOfDocuments'] }}</td>

      <td> 

                     <table class="table table-bordered text-capitalize">

                
            
                 <tr>
                  <?php
                  $docPath=(array)$query;

                  $url=str_replace('\\' ,'/',$docPath['path']);
                  $urlArray=explode('/',$url);
                  $c=\MS\Core\Helper\Comman::random(2);
                  array_splice($urlArray, 1, 0, $c);
                  $url=implode('/', $urlArray);
           //     dd($docPath);  

                 //;
                 // if('Panchnma Copy_452'==explode('.',$docName)[0])dd($docPath);
                   ?>
                  
                  
                  <td>
<a href="{{ route('TMS.Task.Get.File.Name',['UniqId'=>\MS\Core\Helper\Comman::en4url($c),'TaskId'=>\MS\Core\Helper\Comman::en4url($data['taskData']['UniqId']),'StepId'=>\MS\Core\Helper\Comman::en4url($data ['StepId']),'TypeOfDocument'=>\MS\Core\Helper\Comman::en4url($docPath['TypeOfDocument']),'FileName'=>$query['FileName']]) }}" target="_BLANK">
                 {{ explode('.',$query['FileName'])[0] }}
               </a>
               </td>
               @if(array_key_exists('DateOfDocument', $docPath) && ($docPath['DateOfDocument']!=null))
           
               <td>
                 
                 {{ Carbon::parse($docPath['DateOfDocument'])->format('d / m / Y') }}

                 <br>
                 {{ \Form::inputDate(['name'=>'date['.$query['UniqId'].']' ,'lable'=>'Change Date','value'=> $docPath['DateOfDocument'],'data'=>['input-size'=>'col-lg-12'] ]) }}
               </td> 

                @endif

                   @if(array_key_exists('NoOfDocument', $docPath)  && ($docPath['NoOfDocument']!=null))
               <td>
                 
                 Invoice No.{{ $docPath['NoOfDocument'] }}
                 {{ \Form::inputText(['name'=>'documentNo['.$query['UniqId'].']' ,'lable'=>'Change Invoice No.','value'=> $docPath['NoOfDocument'],'data'=>['input-size'=>'col-lg-12'] ]) }}
               </td> 

                @endif

                @if(array_key_exists('AmountOfDocument', $docPath)  && ($docPath['AmountOfDocument']!=null))
               <td>
                 
                Total Amount: ₹ {{ $docPath['AmountOfDocument'] }}
                 {{ \Form::inputNumber(['name'=>'documentNo['.$query['UniqId'].']' ,'lable'=>'Change Amount','value'=> $docPath['AmountOfDocument'],'data'=>['input-size'=>'col-lg-12'] ]) }}
               </td> 

                @endif




               </tr>
                
             
               
               </table>

       </td>


  <?php 


//dd();
  $dataFortextarea=[
'lable'=>'Write your query  Replay here',

'name'=>'SelectedFilesQuery['.$data["StepId"].']['.$docPath["UniqId"].'][query]',
'value'=>'',
'data'=>['input-size'=>'col-lg1-12'],
  ];

  // dd( $docDetails1);
  ?>  

      <td>  {{$docDetails1['Query']}}</td>

        <td>  {{\Form::inputTextArea($dataFortextarea,$loop->iteration+1)}} </td>

  </tr>




  @endforeach

  @endforeach




  @endforeach




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