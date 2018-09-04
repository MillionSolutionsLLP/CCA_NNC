<?php 

	
			$tableId=0;
		\MS\Core\Helper\Comman::DB_flush();
		$build=new \MS\Core\Helper\Builder ('B\\TMS');
	//	$build->title("View All Assined Task");
	//	
		\MS\Core\Helper\Comman::DB_flush();
		$model=new \B\TMS\Model($tableId);

//dd($model->MS_all());
		$model=$model->paginate(5);

	//	$model=$model->MS_all();

		
		//dd($model);

						$diplayArray=[
				//'UniqId'=>'ID',

				'HireAgencyCode'=>'Name of Assined Agency',


				//'NewsDate'=>'Date',

				'NameOperator'=>'Name of Operator',

				//'IllegalTypeBroadcasting'=>'Type Broacasting',
				

				'ModePiracy'=>'Mode of Piracy',
				//'NameOfNetwork'=>'LCO name',

				'Status'=>'Cur. Status',

						];

						$link=[

			// 'delete'=>[
			// 	'method'=>'AMS.Agency.Delete.Id',
			// 	'key'=>'UniqId',

			// ],

			


		
			'view'=>[
				'method'=>'TMS.Task.View.Id',
				'key'=>'UniqId',]
			// ],

		];

		$data=[

		'paginate'=>false,
		"paginate-limit"=>5,
		];



						$build->listData($model,$data)->listView($diplayArray)->btn([
												'action'=>"\\B\\TMS\\Controller@taskAdd",
												'color'=>"btn-info",
												'icon'=>"fa fa-plus",
												'text'=>"Add Task"
											])->btn( 
											[
												'action'=>"\\B\\TMS\\Controller@taskViewByColumn",
												'color'=>"btn-default",
												'icon'=>"fa fa-eye",
												'text'=>"Group By Agency",
												'data'=>'HireAgencyCode'
											])->btn( 
											[
												'action'=>"\\B\\TMS\\Controller@taskViewByColumn",
												'color'=>"btn-default",
												'icon'=>"fa fa-eye",
												'text'=>"Group By Area of Piracy",
												'data'=>'AreaPiracy'
											])->addListAction($link)->listGetter(['HireAgencyCode']);	
						\MS\Core\Helper\Comman::DB_flush();
						echo $build->view(true,'list');
						


?>