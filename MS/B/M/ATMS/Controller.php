<?php
namespace B\ATMS;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     
		$this->middleware('agencyAdmin');
        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){

			\MS\Core\Helper\Comman::DB_flush();

		//Base::migrate([ ['id'=>3] ]);


			$data=[

			

			];
		return view('ATMS.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){

	\MS\Core\Helper\Comman::DB_flush();


			$data=[

			

			];
		return view('ATMS.V.Object.MasterDetails')->with('data',$data);
		
		
	}


	public function taskViewById($UniqId){


		$uniqId=\MS\Core\Helper\Comman::de4url($UniqId);
		//$uniqId=$enUniqId;
		\MS\Core\Helper\Comman::DB_flush();
		//dd($uniqId);
		$id=0;
		$m=new \B\TMS\Model();

		//dd($m);
		//$m->MS_flush();
		if($m->where('UniqId',$uniqId)->first()!=null){$rowData=$m->where('UniqId',$uniqId)->first()->toArray();}
		else{$rowData=[];}

		if(count($rowData)>0){


				\MS\Core\Helper\Comman::DB_flush();
			$m2=new \B\TMS\Model('1',$rowData['UniqId']);
			$rowData2=$m2->MS_all()->toArray();
			
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

		return view('ATMS.V.Object.TaskDetails')->with('data',$data);
	}



	public function taskUploadById($UniqId){

		$uniqId=\MS\Core\Helper\Comman::de4url($UniqId);
		//dd($uniqId);



			$id=2;
				\MS\Core\Helper\Comman::DB_flush();
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
		\MS\Core\Helper\Comman::DB_flush();
		$build->title("Upload Document For Task No.".$uniqId)->action("taskUploadByIdPost",\MS\Core\Helper\Comman::en4url($uniqId))->btn([
								'action'=>"\\B\\ATMS\\Controller@taskViewById",
								'action-para'=>\MS\Core\Helper\Comman::en4url($uniqId),
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back to Task Overview"
							])->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Upload"
							])->js(["Core.js.Backend.Multiple","ATMS.J.UploadDocument"])->extraFrom(2,['title'=>'Attachments','multiple'=>true,'multipleAdd'=>true]);

		//dd($build);
		\MS\Core\Helper\Comman::DB_flush();
		return $build->view();


	}


	public function taskUploadByIdPost($UniqId,R\UploadDocuments $r){

		$UniqId=\MS\Core\Helper\Comman::de4url($UniqId);
		$input=$r->all();

		$dataArray=[];



		foreach ($input['TypeOfDocuments'] as $key => $value) {
		

			$dataArray[$key]=[


				'type'=>$input['TypeOfDocuments'][$key],
				'date'=>$input['DateOfDocument'][$key],
				//'file'=>$input['agencyDocument'][$key],



			];

			if(array_key_exists('NoOfDocument', $input)){

				if(array_key_exists($key, $input['NoOfDocument'])){

					$dataArray[$key]['NoOfDocument']=$input['NoOfDocument'][$key];

				}

			}

			if(array_key_exists('AmountOfDocument', $input)){

				if(array_key_exists($key, $input['AmountOfDocument'])){

					$dataArray[$key]['AmountOfDocument']=$input['AmountOfDocument'][$key];

				}

			}


			if(array_key_exists('agencyDocument', $input)){

				if(array_key_exists($key, $input['agencyDocument'])){

					$dataArray[$key]['file']=$input['agencyDocument'][$key];

				}else{

					$status=402;
					$array=[
					'msg'=>[ 'Please select all to upload.' ],
			 		

				];

	
				 return response()->json($array, $status);

//					return collect([ 'msg'=> ])->toJ; 
				}

			}




		}



		$path=[

			'000'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'000',
			'111'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'111',
			'222'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'222',
			'333'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'333',
			'444'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'444',
			'555'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'555',
			'666'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'666',
			'777'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'777',
			'888'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'888',
			'999'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'999',
			];

			$alltype=Base::getTypeofDocuments();
			$disk='ATMS';
			$filePath=[];
			//dd($alltype);



		foreach ($dataArray as $key => $value) {

				$fileUniqId=Base::genUniqID();
				$fileName=$alltype[$value['type']] ."_".$fileUniqId.".".$value['file']->getClientOriginalExtension();

				$filePath[$fileName]['path']=$value['file']->storeAs($path[$value['type']], $fileName, $disk);
				$filePath[$fileName]['UniqId']=$fileUniqId;
				$filePath[$fileName]['DateOfDocument']=$value['date'];
				$filePath[$fileName]['TypeOfDocument']=$value['type'];
				$filePath[$fileName]['NameOfDocument']=$key;
				if(array_key_exists('NoOfDocument', $value))$filePath[$fileName]['NoOfDocument']=$value['NoOfDocument'];

				if(array_key_exists('AmountOfDocument', $value))$filePath[$fileName]['AmountOfDocument']=$value['AmountOfDocument'];
		}


	\MS\Core\Helper\Comman::DB_flush();
		$m1=new \B\TMS\Model('1',$UniqId);




		$dbArray=[

			'TypeOfAction'=>'3',
			'DocumentUploaded'=>true,
			'DocumentArray'=>json_encode($filePath,true,3),
			'DocumentVerified'=>false,
			'DocumentVerifiedArray'=>json_encode([],true,3),
			'VerifiedBy'=>null,
			'TakenBy'=>session('user.userData.UniqId'),
			'DocumentQuery'=>false,
			'DocumentQueryArray'=>json_encode([],true,3),
			'DocumentReply'=>false,
			'DocumentReplyArray'=>json_encode([],true,3),
			'QueryRisedBy'=>null,

		];

		

		$m1->MS_add($dbArray);

		$status=200;
			$array=[
					'msg'=>'OK',
					'redirectData'=>action('\B\ATMS\Controller@taskViewById',['UniqId'=>\MS\Core\Helper\Comman::en4url($UniqId)] ),
					

				];

				return response()->json($array, $status);

				//return $this->taskViewById(\MS\Core\Helper\Comman::en4url($UniqId));


				





	


	}


	public function getUploadedFile ($UniqId,$TaskId,$StepId,$TypeOfDocument,$FileName){

		
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


	public function queryReplay($TaskId,$StepId){

			\MS\Core\Helper\Comman::DB_flush();
			$status=200;
			$array=[
					'msg'=>"OK",
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
		 
							
			$data['TaskId']=\MS\Core\Helper\Comman::de4url($TaskId);
			$data['StepId']=\MS\Core\Helper\Comman::de4url($StepId);

			$m1=new \B\TMS\Model();


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
			$m2=new \B\TMS\Model('1',$data['TaskId']) ;
			
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

			return view('ATMS.V.Object.TaskQueryReplay')->with('data',$data);




	}



	public function queryReplayPost (R\ReplayWithDocuments $r,$TaskId,$StepId){
					\MS\Core\Helper\Comman::DB_flush();

					$input = $r->all();
			$status=200;
			$array=[
					'msg'=>"OK",
			 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
			 		
				];

	
		 
							
			$data['TaskId']=\MS\Core\Helper\Comman::de4url($TaskId);
			$data['StepId']=\MS\Core\Helper\Comman::de4url($StepId);

			$m1=new \B\TMS\Model();


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
			$m2=new \B\TMS\Model('1',$data['TaskId']) ;
			
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


		//	dd($data['stepData']['DocumentQueryArray']['QueryDocumentArray']);

			$UniqId=$data['TaskId'];

			$path=[

			'000'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'000',
			'111'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'111',
			'222'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'222',
			'333'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'333',
			'444'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'444',
			'555'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'555',
			'666'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'666',
			'777'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'777',
			'888'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'888',
			'999'=>'Data'.DIRECTORY_SEPARATOR.$UniqId.DIRECTORY_SEPARATOR.'999',
			];

			 $docArray=current(current($data['stepData']['DocumentQueryArray']));
			 $documentOutArray=[];

			foreach ($input['replaceFiles'] as $key => $value) {

				//dd($data['stepData']['DocumentArray']);
				if(array_key_exists($docArray['QueryDocumentArray'][$key]['FileName'], $data['stepData']['DocumentArray'])){	
						
						$queryData=$docArray['QueryDocumentArray'][$key];

						
						//dd($docArray);
						$oldData=$data['stepData']['DocumentArray'][$docArray['QueryDocumentArray'][$key]['FileName']];
						$newPath=$path[$oldData['TypeOfDocument']].DIRECTORY_SEPARATOR.explode('.', $queryData['FileName'])[0].'.'.$value->getClientOriginalExtension();
						$newOldPath=$path[$oldData['TypeOfDocument']].DIRECTORY_SEPARATOR.explode('.', $docArray['QueryDocumentArray'][$key]['FileName'])[0].'_old.'.explode('.', $docArray['QueryDocumentArray'][$key]['FileName'])[1];
						//dd($newPath);
					//	dd(\Storage::disk('ATMS')->exists($oldData['path']));

						if(\Storage::disk('ATMS')->exists($newOldPath))\Storage::disk('ATMS')->	delete($newOldPath);
						if(\Storage::disk('ATMS')->exists($oldData['path'])) \Storage::disk('ATMS')->move($oldData['path'], $newOldPath);


						//dd($docArray['QueryDocumentArray'][$key]['FileName']);
						$value->storeAs($path[$oldData['TypeOfDocument']],explode('.', $queryData['FileName'])[0].'.'.$value->getClientOriginalExtension(),'ATMS');
						//dd($value);
						//dd($newOldPath);
					//dd(key($data['stepData']['DocumentQueryArray'][0]));
						$queryNo=key($data['stepData']['DocumentQueryArray'][0]);


						unset($data['stepData']['DocumentArray'][$docArray['QueryDocumentArray'][$key]['FileName']]);
						$data['stepData']['DocumentQueryArray'][0][$queryNo]['Replay']=true;
							$d1=[
							"path" => $newPath,
						    "UniqId" => $oldData[ "UniqId"],
						    "DateOfDocument" => $oldData[ "DateOfDocument"],
						    "TypeOfDocument" => $oldData[ "TypeOfDocument"],
						    "NoOfDocument" => $oldData[ "NoOfDocument"],
						    "AmountOfDocument" => $oldData[ "AmountOfDocument"],
						    "oldpath"=>$newOldPath
						    ];


						  
							 $data['stepData']['DocumentArray'][ explode('.', $queryData['FileName'])[0].'.'.$value->getClientOriginalExtension() ]=$d1;
							 $data['stepData']['DocumentReply']=true;
							 $replyNo=Base::genUniqID();

							 $data['stepData']['DocumentReplyArray'][$replyNo]=[

									'Replay'=>$input['ReplayFromAgency'],
									'ApprovedBy'=>null,
									'ReplayStatus'=>0,
									//'ReplyDocumentArray'=>$selectedFile

							

							 ];

							  $data['stepData']['DocumentReplyArray'][$replyNo][$d1['UniqId']]=$d1;


	 

				}








	

			}

			

					$dbArray=[

			
			'DocumentArray'=>collect( $data['stepData']['DocumentArray'])->toJson(),
			'DocumentQuery'=>false,
			'DocumentQueryArray'=>collect( $data['stepData']['DocumentQueryArray'])->toJson(),
			'DocumentReply'=>true,
			'DocumentReplyArray'=>collect( $data['stepData']['DocumentReplyArray'])->toJson(),
			

		];

		//\MS\Core\Helper\Comman::DB_flush();
		
		$m2->MS_update($dbArray , $data['StepId']);

		$status=200;
			$array=[
					'msg'=>'OK',
					'redirectData'=>action('\B\ATMS\Controller@taskViewById',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['TaskId'])] ),
					

				];

				return response()->json($array, $status);

		//	dd($data);


	}
}