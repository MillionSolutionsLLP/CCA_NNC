<?php 






		$tableId=0;

		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
		//$build->title("View All Agency");

		//dd(session()->all());
	$uniqId=session('user.userData.UniqId');

	$model=new \B\TMS\Model($tableId);

	$model=$model->where('HireAgencyCode',$uniqId);
	//dd($model);
	//dd($model->where('HireAgencyCode',$uniqId)->get()->toArray());
		$model=$model->paginate($tableId);
	//	dd($model);

						$diplayArray=[
				//'UniqId'=>'ID',

				'NameOperator'=>'Name',


				//'NewsDate'=>'Date',

				'NameOwner'=>'Name of Owner',

				'AreaPiracy'=>'Area of Piracy',
				

				'IllegalTypeBroadcasting'=>'Type Illegal Broadcasting',


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
				'method'=>'ATMS.Task.View.Id',
				'key'=>'UniqId',

			],

		];



						$build->listData($model)->listView($diplayArray)
						// btn([
						// 						'action'=>"\\B\\AMS\\Controller@agencyAdd",
						// 						'color'=>"btn-info",
						// 						'icon'=>"fa fa-plus",
						// 						'text'=>"Add Agency"
						// 					])
						->addListAction($link)
						;	

					//dd($build);
					echo $build->view(true,'list')->render();



?>