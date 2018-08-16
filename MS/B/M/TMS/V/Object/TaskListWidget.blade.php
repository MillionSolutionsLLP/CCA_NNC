<?php 

	
			$tableId=0;

		$build=new \MS\Core\Helper\Builder ('B\\TMS');
		$build->title("View All Assined Task");
	//	

		$model=new \B\TMS\Model($tableId);
		$model=$model->paginate($tableId);
	//	dd($model);

						$diplayArray=[
				//'UniqId'=>'ID',

				'HireAgencyCode'=>'Name of Assined Agency',


				//'NewsDate'=>'Date',

				'NameOperator'=>'Name of Operator',

				'IllegalTypeBroadcasting'=>'Type Broacasting',
				

				'ModePiracy'=>'Mode of Piracy',
				'NameOfNetwork'=>'LCO name',

				'Status'=>'Cur. Status',

						];

						$link=[

			// 'delete'=>[
			// 	'method'=>'AMS.Agency.Delete.Id',
			// 	'key'=>'UniqId',

			// ],

			// 'edit'=>[
			// 	'method'=>'AMS.Agency.Edit.Id',
			// 	'key'=>'UniqId',

			// ],


		
			'view'=>[
				'method'=>'TMS.Task.View.Id',
				'key'=>'UniqId',]
			// ],

		];



						$build->listData($model)->listView($diplayArray)->btn([
												'action'=>"\\B\\TMS\\Controller@taskAdd",
												'color'=>"btn-info",
												'icon'=>"fa fa-plus",
												'text'=>"Add Task"
											])->addListAction($link)->listGetter(['HireAgencyCode']);	

						echo $build->view(true,'list');


?>