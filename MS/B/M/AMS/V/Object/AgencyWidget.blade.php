<?php 






		$tableId=0;

		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
		//$build->title("View All Agency");
	//	

		$model=new \B\AMS\Model($tableId);
		$model=$model->paginate($tableId);
	//	dd($model);

						$diplayArray=[
				//'UniqId'=>'ID',

				'Name'=>'Name',


				//'NewsDate'=>'Date',

				'City'=>'City',

				'State'=>'State',
				

				'Username'=>'Agency ID',


				'Status'=>'Cur. Status',

						];

						$link=[

			// 'delete'=>[
			// 	'method'=>'AMS.Agency.Delete.Id',
			// 	'key'=>'UniqId',

			// ],

			'edit'=>[
				'method'=>'AMS.Agency.Edit.Id',
				'key'=>'UniqId',

			],


			'view'=>[
				'method'=>'AMS.Agency.View.Id',
				'key'=>'UniqId',

			],

		];



						$build->listData($model)->listView($diplayArray)->btn([
												'action'=>"\\B\\AMS\\Controller@agencyAdd",
												'color'=>"btn-info",
												'icon'=>"fa fa-plus",
												'text'=>"Add Agency"
											])->addListAction($link);	

						echo $build->view(true,'list');



?>