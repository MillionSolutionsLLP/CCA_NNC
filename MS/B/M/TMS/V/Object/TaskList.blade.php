<?php 

	
			$tableId=0;
		\MS\Core\Helper\Comman::DB_flush();
		$build=new \MS\Core\Helper\Builder ('B\\TMS');
	//	$build->title("View All Assined Task");
	//	
		\MS\Core\Helper\Comman::DB_flush();
		$model=new \B\TMS\Model($tableId);

//dd($model->MS_all());

		if($model->get() !=null){

					if(array_key_exists('columnName', $data))

					{	


						switch ($data['columnName']) {
							case 'HireAgencyCode':
								$data1=$model->get()->groupBy($data['columnName'])->toArray();
								$data['ColumnList']=[
								//'HireAgencyCode'=>'Agency Code',
								//'HireAgencyCode.B_AMS_Logics=getAgencyName'=>'Agency Name',
								'UniqId'=>'Task Code',
								'NameOperator'=>'Name of Operator',
								'AreaPiracy'=>'Area of Piracy',
								'ModePiracy'=>'Mode of Piracy',
								'StatusOperator.of.NameOfNetwork'=>'Status of Operator'

								];


								$data['ColumnList_Header']=[
								'Agency Code',
								'Agency Name',
								'Task Code',
								'Name of Operator',
								'Area of Piracy',
								'Mode of Piracy',
								'Status of Operator'

								];



								break;


							case 'AreaPiracy':
								$data1=$model->get()->groupBy($data['columnName'])->toArray();
								$data['ColumnList']=[

								//'AreaPiracy'=>'Area of Piracy',
								'HireAgencyCode'=>'Agency Code',
								'HireAgencyCode.B_AMS_Logics=getAgencyName'=>'Agency Name',
								'UniqId'=>'Task Code',
								'NameOperator'=>'Name of Operator',
								//'AreaPiracy'=>'Area of Piracy',
								'ModePiracy'=>'Mode of Piracy',
								'StatusOperator.of.NameOfNetwork'=>'Status of Operator'

								];


								$data['ColumnList_Header']=[
								'Area of Piracy',
								'Agency Code',
								'Agency Name',
								'Task Code',
								'Name of Operator',
								
								'Mode of Piracy',
								'Status of Operator'

								];

								break;
							
							default:
								$data1=[];
								$data['ColumnList']=[];
								break;
						}


						


					}
					
					

		}



		//dd($data);

		?>

<div class="panel panel-info">


<div class="panel-heading"> <h5 > <strong> <i class="fa fa-eye"></i> View assined Task by Group </strong> </h5></div>
		      <table class="table table-responsive table-bordered table-hover text-capitalize table-striped">

		      <tr>
		      
		      @foreach( $data['ColumnList_Header'] as $title )
		      <th>{{ $title}}</th>
		  
		      @endforeach
		      </tr>

		@foreach($data1 as $agency=>$taskDetails)
		<?php
		switch ($data['columnName']) {
			case 'HireAgencyCode':
				$groupByTitle=\B\AMS\Logics::getAgencyName($agency);
				break;


			case 'AreaPiracy':
			
				$groupByTitle=$agency;
				break;

			
			default:
				//dd();

				$groupByTitle='';
				break;
		}

		?>

		<tr>
			
			@if($data['columnName'] == 'HireAgencyCode')

		<td rowspan=" {{ count($taskDetails)+1 }}" >{{ $agency }} </td>


		<td rowspan=" {{ count($taskDetails)+1 }}" >{{ $groupByTitle }} </td>
		@elseif($data['columnName'] == 'AreaPiracy')

		<td rowspan=" {{ count($taskDetails)+1 }}" >{{ $groupByTitle }} </td>
		@endif
		



		</tr>

		@foreach($taskDetails as $key=>$data2)
		<?php //dd($data2); ?>
			<tr>


			@foreach($data['ColumnList'] as  $cloumName=>$vName)
			<?php
			//dd($data2);
			$colName=explode('.', $cloumName);

			//var_dump($colName[1]);

			//if(count($colName) == '2')dd($colName);

			?>

			@if(count($colName) == 1 )
			<?php// dd($colName[0]);?>
			<td> {{ $data2[$colName[0]]}} </td>


			@elseif(count($colName) == 2)

			<?php  $colName=explode('.', $cloumName); //dd($colName);

			$colName2=explode('=',$colName[1]);
			$class=str_replace('_', '\\', $colName2[0]);

			$outPut=$class::$colName2[1]($data2[$colName[0]]);


			 ?>
			<td>  {{ $outPut }}  </td>


			@elseif(count($colName) == 3)

			<?php //dd($colName);  ?>

			<td>   {{ $data2[$colName[0]] }} {{ $colName[1] }} {{ $data2[$colName[2]] }}   </td>

			@endif

			

			@endforeach

			</tr>
		@endforeach



		@endforeach

		</table>


		</div>