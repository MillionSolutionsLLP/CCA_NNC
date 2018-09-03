<?php
namespace B\TMS;
use Illuminate\Http\Request;
class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     
		$this->middleware('backend');
        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){
			\MS\Core\Helper\Comman::DB_flush();
//\MS\Core\Helper\Comman::DB_flush();

	//	dd(session()->all());
	// 	Base::migrate(

	// [	
	// 			['id'=>'7'],
	// 			//['id'=>'2'],
	// 			//['id'=>'3'],
	// 			//['id'=>'4'],

	// ]


		//	);

	// 	dd(session()->all());


			$data=[

			

			];
		return view('TMS.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('TMS.V.Object.MasterDetails')->with('data',$data);
		
		
	}


	public function taskAdd(){
		\MS\Core\Helper\Comman::DB_flush();

		$id=0;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);



		$build->title("Assign Task to Agency")->heading(['Basic Details of APR ,Recivied from STAR'])->content($id)->action("taskAddPost")->btn([
								'action'=>"\\B\\TMS\\Controller@taskView",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							])->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							]);
		// $build->title("Add Agency")->heading(['Basic Details of Agency'])->content($id)->action("agencyAdd")->btn([
		// 						'action'=>"\\B\\AMS\\Controller@indexData",
		// 						'color'=>"btn-info",
		// 						'icon'=>"fa fa-fast-backward",
		// 						'text'=>"Back"
		// 					])->heading(['Conern Person Details'])->extraFrom('2')->heading(['Login Details For Agency'])->extraFrom('3')->btn([
		// 						//'action'=>"\\B\\MAS\\Controller@addCCPost",
		// 						'color'=>"btn-success",
		// 						'icon'=>"fa fa-floppy-o",
		// 						'text'=>"Save"
		// 					]);
	\MS\Core\Helper\Comman::DB_flush();

		return $build->view();
	}


	public function taskAddPost(R\AddTask $r){
			\MS\Core\Helper\Comman::DB_flush();

			$input=$r->input();
			$model=new Model(0);
			if(array_key_exists('UniqId', $input)){

				$uniqid=$input['UniqId'];

			}else{$uniqid=Base::genUniqID();}



			$data=[
				[
					'id'=>0,
					'code'=>$uniqid
				]
			];


			$model->MS_add($input);

			\MS\Core\Helper\Comman::DB_flush();

			$modelForLCO=new Model('2');


		

			$dataForLCO=[


				'NameOfLCO'=>strtolower($input['NameOfNetwork']),
				'LastNameOfOperator'=>$input['NameOperator'],
				'LastModeoPiracy'=>$input['ModePiracy'],

				'NameOfOperatorArray'=>collect([ [ 'TaskId'=>$uniqid,'NameOfOperator'=>$input['NameOperator']  ]  ])->toJson(),

				'ModeoPiracyArray'=>collect([ [ 'TaskId'=>$uniqid,'ModePiracy'=>$input['ModePiracy']  ]  ])->toJson(),

							];

			$LCOCheck=$modelForLCO->where('NameOfLCO','=',strtolower($input['NameOfNetwork']))->first();
			//dd($modelForLCO->MS_all());
			//dd($LCOCheck);
		//	dd($dataForLCO);

			if($LCOCheck == null)$modelForLCO->MS_add($dataForLCO);
				//dd($modelForLCO);
			\MS\Core\Helper\Comman::DB_flush();
			$modelOfOwner=new Model('3');
			//dd($modelForLCO);

			$dataForOwner=[


				'NameOfOperator'=>strtolower($input['NameOperator']),
				'NameOfOwner'=>$input['NameOwner'],
				'LastModeOfPiracy'=>$input['ModePiracy'],
				'LastStatusOfOperator'=>$input['StatusOperator'],

				'LastModeOfPiracyArray'=>collect([ [ 'TaskId'=>$uniqid,'ModePiracy'=>$input['ModePiracy']  ]  ]),

				'LastStatusOfOperatorArray'=>collect([ [ 'TaskId'=>$uniqid,'StatusOperator'=>$input['StatusOperator']  ]  ]),

							];



			$OwnerCheck=$modelOfOwner->where('NameOfOperator',strtolower($input['NameOperator']))->first();

			if($OwnerCheck == null)$modelOfOwner->MS_add($dataForOwner);


		//	dd(Base::migrate([['id'=>'1','code'=>$uniqid]]));
		//	dd($input);
	
			$returnData=Base::migrate([['id'=>'1','code'=>$uniqid]]);


			//dd($returnData);	
			$rData=		

					[

					'UniqId'=>$uniqid=Base::genUniqID(),

					'TypeOfAction'=>'0',

					'DocumentUploaded'=>false,

					'DocumentArray'=>collect([])->toJson(),

					'DocumentVerified'=>false,

					'DocumentVerifiedArray'=>collect([])->toJson(),

					'VerifiedBy'=>'0',

					'TakenBy'=>session('user.userData.UniqId'),

					];
			//dd($uniqid);
			\MS\Core\Helper\Comman::DB_flush();
			$model2=new Model('1',$input['UniqId']);
			//dd($model2);
			$model2->MS_add($rData,$returnData['id'],$input['UniqId']);
			\MS\Core\Helper\Comman::DB_flush();
			$model3=new \B\AMS\Model();
		//	dd($model3);
			//dd($model3->where('UniqId',$input['HireAgencyCode'])->pluck('AllocatedJobs')->first());
			$agencJobData=[];
			if($model3->where('UniqId',$input['HireAgencyCode'])->pluck('AllocatedJobs')->first()==null){


				$agencJobData[]=$input['UniqId'];
			}else{
				$preData=$model3->where('UniqId',$input['HireAgencyCode'])->pluck('AllocatedJobs')->first();
				//dd($preData);
				$preData=json_decode($preData,true,2);
				if(!in_array($input['UniqId'], $preData)){
								$agencJobData[]=$input['UniqId'];}else{
									$agencJobData=$preData;
								}

			}

			$agencJobData=json_encode($agencJobData,true,2);
			$model3->MS_update(['AllocatedJobs'=>$agencJobData,'UniqId'=>$input['HireAgencyCode'],]);
			$status=200;
			$array=[
					'msg'=>"OK",
			 		'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
		 return response()->json($array, $status);
}





public function taskView(){

	
					\MS\Core\Helper\Comman::DB_flush();
					$tableId=0;

		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
		$build->title("View All Assined Task");
	//	

		$model=new Model($tableId);
		$model=$model->paginate($tableId);
			\MS\Core\Helper\Comman::DB_flush();
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

			'delete'=>[
				'method'=>'TMS.Task.Delete.Id',
				'key'=>'UniqId',

			],

			// 'edit'=>[
			// 	'method'=>'AMS.Agency.Edit.Id',
			// 	'key'=>'UniqId',

			// ],


			'view'=>[
				'method'=>'TMS.Task.View.Id',
				'key'=>'UniqId',

			],

			'AllocationLater'=>[
				'method'=>'TMS.Task.Gen.Allocation',
				'key'=>'UniqId',
			],

		];



						$build->listData($model)->listView($diplayArray)->btn([
												'action'=>"\\B\\TMS\\Controller@taskAdd",
												'color'=>"btn-info",
												'icon'=>"fa fa-plus",
												'text'=>"Add Task"
											]



											)->btn( 
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

						return $build->view(true,'list');


}

public function taskViewById($UniqId){

\MS\Core\Helper\Comman::DB_flush();

		$uniqId=\MS\Core\Helper\Comman::de4url($UniqId);
		//$uniqId=$enUniqId;
		$id=0;
		$m=new \B\TMS\Model();

		
		if($m->where('UniqId',$uniqId)->first()!=null){$rowData=$m->where('UniqId',$uniqId)->first()->toArray();}
		else{$rowData=[];}

		if(count($rowData)>0){

\MS\Core\Helper\Comman::DB_flush();
			\MS\Core\Helper\Comman::DB_flush();
			$m2=new Model('1',$rowData['UniqId']);
			$rowData2=$m2->MS_all()->toArray();

//dd($rowData2);
			
			
			\MS\Core\Helper\Comman::DB_flush();
			

		}else{

			$rowData2=[];
		}
		


		$data=[

			'task'=>$rowData,
			'taskDetaisls'=>$rowData2
		];
		//dd($m->where('UniqId',$uniqId)->first());
	//	dd($newsData);

		return view('TMS.V.Object.TaskDetails')->with('data',$data);
}


public function taskDeleteById($UniqId){
			\MS\Core\Helper\Comman::DB_flush();
			$UniqId=\MS\Core\Helper\Comman::de4url($UniqId);
			$status=200;
			$tableId=0;
			$rData=['UniqId'=>$UniqId];
			

			$m1=new Model($tableId);
			$agencyCode=$m1->where('UniqId',$UniqId)->first()->toArray()['HireAgencyCode'];

			$m2=new \B\AMS\Model ();

			$jobRowData=$m2->where('UniqId',$agencyCode)->pluck('AllocatedJobs')->first();
			if($jobRowData!=null){

				$jobArray=json_decode($m2->where('UniqId',$agencyCode)->pluck('AllocatedJobs')->first(),true);

			}else{
				$jobArray=[];	
			}
			

			if(in_array($UniqId,$jobArray ))unset($jobArray[array_search($UniqId,$jobArray)]);
		//	dd($jobArray );
			if(!count($jobArray)>0)$jobArray=null;

			if($jobArray!=null)$jobArray=json_encode($jobArray,true,3);

			$updatArray=[
				'UniqId'=>$agencyCode,
				'AllocatedJobs'=>$jobArray
			];
			//dd()

			$m2->MS_update($updatArray,0);

			//dd(json_decode($m2->where('UniqId',$agencyCode)->pluck('AllocatedJobs')->first(),true));
			

			$m1->MS_delete($rData,$tableId);

			\Storage::disk('ATMS')->deleteDirectory("Data".DIRECTORY_SEPARATOR.$UniqId);

			
			\MS\Core\Helper\Comman::DB_flush();
			$m3=new Model(1,$UniqId);
			$m3->deleteTable();	
			\MS\Core\Helper\Comman::DB_flush();
			

				$status=200;
			$array=[
					'msg'=>"OK",
			 		'redirectData'=>route('TMS.Task.View'),
			 

				];
				\MS\Core\Helper\Comman::DB_flush();
				//return $this->taskViewById(\MS\Core\Helper\Comman::en4url($UniqId));
	
		// return response()->json($array, $status);
			
		return  $this->taskView();


}

public function taskGenAllocationLatterById($UniqId){



		$UniqId=\MS\Core\Helper\Comman::de4url($UniqId);

		$m1=new \B\AMS\Model ();

	
	$taskCode=$UniqId;

	\MS\Core\Helper\Comman::DB_flush();

	$m2=new \B\TMS\Model ();
	$taskdata=$m2->where('UniqId',$taskCode)->first()->toArray();
	$agencyCode=$taskdata['HireAgencyCode'];
	$data=[

		'agency'=>['name'=>$m1->getHireAgencyCodeFromId($agencyCode)],
		'task'=>$taskdata,

	];


	$data['task']['fullAddress']='Town.District,State';

return view('TMS.V.Pages.allocationLatter')->with('data',$data);
}


public function taskApproveById($UniqId,$StepId){

	\MS\Core\Helper\Comman::DB_flush();
	$UniqId=\MS\Core\Helper\Comman::de4url($UniqId);
	$StepId=\MS\Core\Helper\Comman::de4url($StepId);


	$m1=new Model('1',$UniqId) ;

	$taskArray=[];
	if($m1->where('UniqId',$StepId)->first() != null ){

		$taskArray=$m1->where('UniqId',$StepId)->first()->toArray();

		$documentArray=(array)json_decode($taskArray['DocumentArray'],true,3);

		$documentVerifiedArray=(array)json_decode($taskArray['DocumentVerifiedArray'],true,3);
	}

	//dd(session()->all());



	//;

	$m1->MS_update( ['DocumentVerifiedArray'=>json_encode($documentArray),'DocumentVerified'=>1,'VerifiedBy'=>session('user.userData.UniqId')] , $StepId ) ;



	$status=200;
			$array=[
					'msg'=>"OK",
			 		'redirectData'=>route('TMS.Task.View.Id',['UniqId'=>\MS\Core\Helper\Comman::en4url($UniqId) ]),
			 

				];
				\MS\Core\Helper\Comman::DB_flush();
				return $this->taskViewById(\MS\Core\Helper\Comman::en4url($UniqId));
	
		 return response()->json($array, $status);
	




}









public function getUploadedFile($UniqId,$TaskId,$StepId,$TypeOfDocument,$FileName){


			//dd();
			$UniqId=\MS\Core\Helper\Comman::de4url($UniqId);
			$TaskId=\MS\Core\Helper\Comman::de4url($TaskId);

			$StepId=\MS\Core\Helper\Comman::de4url($StepId);

			$TypeOfDocument=\MS\Core\Helper\Comman::de4url($TypeOfDocument);
			//dd($TypeOfDocument);

			//DIRECTORY_SEPARATOR
			$file=implode('/',['Data',$TaskId,$TypeOfDocument,$FileName]);
			$img=\Storage::disk('ATMS')->get($file);
			
			$responseClass=new \Illuminate\Http\Response($img);


		//	dd($file);
			//dd(\Storage::disk('ATMS')->getDriver()->getAdapter()->getPathPrefix().$file);

			$headers=[
'content-type'=> \Storage::disk('ATMS')->mimeType($file)

			];

	// 		return $responseClass->header('content-type', \Storage::disk('ATMS')->mimeType($file));
	// dd($responseClass->header('content-type', \Storage::disk('ATMS')->mimeType($file)));
	// 		return response()->file(\Storage::disk('ATMS')->getDriver()->getAdapter()->getPathPrefix().$file,[
	// 			'content-type'=> \Storage::disk('ATMS')->mimeType($file)

	// 			]);
			ob_end_clean();
			 return $responseClass->header('content-type', \Storage::disk('ATMS')->mimeType($file))->header('Content-Length', \Storage::disk('ATMS')->size($file));//->header('Content-Disposition','attachment; filename=' . $FileName);



			}


			public function riseQuery($TaskId,$StepId){
			\MS\Core\Helper\Comman::DB_flush();
			$status=200;
			$array=[
					'msg'=>"OK",
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
		 
							
			$data['TaskId']=\MS\Core\Helper\Comman::de4url($TaskId);
			$data['StepId']=\MS\Core\Helper\Comman::de4url($StepId);

			$m1=new Model();


			if($m1->where('UniqId',$data['TaskId'])->first()->toArray() ==null){

					$status=422;
			$array=[
					'msg'=>["Task Not Found"],
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
				return response()->json($array, $status);


			}
			$data['taskData']=$m1->where('UniqId',$data['TaskId'])->first()->toArray();

			\MS\Core\Helper\Comman::DB_flush();
			$m2=new Model('1',$data['TaskId']) ;
			
			if($m2->where('UniqId',$data['StepId'])->first() ==null){

					$status=422;
			$array=[
					'msg'=>["Task's Step Details Not Found"],
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
				return response()->json($array, $status);


			}

			$data['stepData']=$m2->where('UniqId',$data['StepId'])->first()->toArray();

			$data['stepData']['DocumentArray']=(array)json_decode($data['stepData']['DocumentArray'],true);
			$data['stepData']['DocumentVerifiedArray']=(array)json_decode($data['stepData']['DocumentVerifiedArray'],true);

			$data['stepData']['DocumentQueryArray']=(array)json_decode($data['stepData']['DocumentQueryArray'],true);
			$data['stepData']['DocumentReplyArray']=(array)json_decode($data['stepData']['DocumentReplyArray'],true);



			



		//	dd($data);

			return view('TMS.V.Object.TaskQueryRise')->with('data',$data);






			}



			public function riseQueryPost ( R\RiseQuery $r, $TaskId,$StepId){

				\MS\Core\Helper\Comman::DB_flush();

				$input=$r->all();
				$data['TaskId']=\MS\Core\Helper\Comman::de4url($TaskId);
				$data['StepId']=\MS\Core\Helper\Comman::de4url($StepId);




			$m1=new Model();


			if($m1->where('UniqId',$data['TaskId'])->first()->toArray() ==null){

					$status=422;
			$array=[
					'msg'=>["Task Not Found"],
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
				return response()->json($array, $status);


			}
			$data['taskData']=$m1->where('UniqId',$data['TaskId'])->first()->toArray();

			\MS\Core\Helper\Comman::DB_flush();
			$m2=new Model('1',$data['TaskId']) ;
			
			if($m2->where('UniqId',$data['StepId'])->first() ==null){

					$status=422;
			$array=[
					'msg'=>["Task's Step Details Not Found"],
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
				return response()->json($array, $status);


			}

			$data['stepData']=$m2->where('UniqId',$data['StepId'])->first()->toArray();

			$data['stepData']['DocumentArray']=(array)json_decode($data['stepData']['DocumentArray'],true);
			$data['stepData']['DocumentVerifiedArray']=(array)json_decode($data['stepData']['DocumentVerifiedArray'],true);

			$data['stepData']['DocumentQueryArray']=(array)json_decode($data['stepData']['DocumentQueryArray'],true);
			$data['stepData']['DocumentReplyArray']=(array)json_decode($data['stepData']['DocumentReplyArray'],true);


			$selectedFile=[];
			foreach ($data['stepData']['DocumentArray'] as $key => $value) {
				
				if(!array_key_exists($value['UniqId'], $input['SelectedFiles'])){

					$data['stepData']['DocumentVerifiedArray'][$key]=$value;

				}else{
				$value['FileName']=$key;
				$selectedFile[$value['UniqId']]=$value;
				}


			}

			$QueryData=[];

			$QueryNo=Base::genUniqID();

			$QueryData[]=[

			$QueryNo=>[
			'Query'=>$input['SelectedFilesQuery'],
			'Replay'=>null,
			'QueryStatus'=>0,
			'QueryDocumentArray'=>$selectedFile

			],



			];


			if($data['stepData']['DocumentQueryArray'] == null){

				$DocumentQueryArray=collect($QueryData)->toJson();

			}else{

				$DocumentQueryArray=collect($QueryData)->toJson();
			}

			$updateArray=[


			'DocumentQuery'=>1,
			'DocumentQueryArray'=>$DocumentQueryArray,
			'QueryRisedBy'=>session('user.userData.UniqId'),

			];



			$m2->MS_update($updateArray,$data['StepId']);

			$status=200;
			$array=[
					'msg'=>"OK",
			 		'redirectData'=>route('TMS.Task.View.Id',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']) ]),
			 		//'data'=>$input,
			 	//	'array'=>$return

				];

	
		 return response()->json($array, $status);

		//	return $this->taskViewById(\MS\Core\Helper\Comman::en4url());
				//dd();
				




			}



	public function  riseQueryView ($TaskId,$StepId){

		        \MS\Core\Helper\Comman::DB_flush();
				$data['TaskId']=\MS\Core\Helper\Comman::de4url($TaskId);
				$data['StepId']=\MS\Core\Helper\Comman::de4url($StepId);
					$m1=new Model();


			if($m1->where('UniqId',$data['TaskId'])->first()->toArray() ==null){

					$status=422;
			$array=[
					'msg'=>["Task Not Found"],
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
				return response()->json($array, $status);


			}
			$data['taskData']=$m1->where('UniqId',$data['TaskId'])->first()->toArray();

			\MS\Core\Helper\Comman::DB_flush();
			$m2=new Model('1',$data['TaskId']) ;
			
			if($m2->where('UniqId',$data['StepId'])->first() ==null){

					$status=422;
			$array=[
					'msg'=>["Task's Step Details Not Found"],
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
				return response()->json($array, $status);


			}

			$data['stepData']=$m2->where('UniqId',$data['StepId'])->first()->toArray();
			$data['stepData']['DocumentArray']=(array)json_decode($data['stepData']['DocumentArray'],true);
			$data['stepData']['DocumentVerifiedArray']=(array)json_decode($data['stepData']['DocumentVerifiedArray'],true);

			$data['stepData']['DocumentQueryArray']=(array)json_decode($data['stepData']['DocumentQueryArray'],true);
			$data['stepData']['DocumentReplyArray']=(array)json_decode($data['stepData']['DocumentReplyArray'],true);


			

			//dd($data);


			return view('TMS.V.Object.TaskApprove')->with('data',$data);

				



	}



	public function  riseQueryReject($TaskId,$StepId){


			    \MS\Core\Helper\Comman::DB_flush();
				$data['TaskId']=\MS\Core\Helper\Comman::de4url($TaskId);
				$data['StepId']=\MS\Core\Helper\Comman::de4url($StepId);
					$m1=new Model();


			if($m1->where('UniqId',$data['TaskId'])->first()->toArray() ==null){

					$status=422;
			$array=[
					'msg'=>["Task Not Found"],
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
				return response()->json($array, $status);


			}
			$data['taskData']=$m1->where('UniqId',$data['TaskId'])->first()->toArray();

			\MS\Core\Helper\Comman::DB_flush();
			$m2=new Model('1',$data['TaskId']) ;
			
			if($m2->where('UniqId',$data['StepId'])->first() ==null){

					$status=422;
			$array=[
					'msg'=>["Task's Step Details Not Found"],
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];



	
				return response()->json($array, $status);


			}

			$data['stepData']=$m2->where('UniqId',$data['StepId'])->first()->toArray();
			$data['stepData']['DocumentArray']=(array)json_decode($data['stepData']['DocumentArray'],true);
			$data['stepData']['DocumentVerifiedArray']=(array)json_decode($data['stepData']['DocumentVerifiedArray'],true);

			$data['stepData']['DocumentQueryArray']=(array)json_decode($data['stepData']['DocumentQueryArray'],true);
			$data['stepData']['DocumentReplyArray']=(array)json_decode($data['stepData']['DocumentReplyArray'],true);
			//dd($m2);
			$m2->MS_update(['DocumentVerified'=>'3,','VerifiedBy'=>session('user.userData.UniqId')],$data['StepId']);
			
			$status=200;
			$array=[
					'msg'=>"OK",
			 		'redirectData'=>route('TMS.Task.View.Id',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']) ]),
			 				];
			return $this->taskViewById(\MS\Core\Helper\Comman::en4url($data['TaskId']));
	
		 return response()->json($array, $status);
			//dd($data);

	}


	public function taskViewByColumn ($Column){



		return view('TMS.V.Object.TaskList')->with('data',['columnName'=>$Column]);



	}
}