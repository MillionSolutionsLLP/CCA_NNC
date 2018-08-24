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
		$id=0;
		$m=new \B\TMS\Model();

		//dd($m);
		//$m->MS_flush();
		if($m->where('UniqId',$uniqId)->first()!=null){$rowData=$m->where('UniqId',$uniqId)->first()->toArray();}
		else{$rowData=[];}

		if(count($rowData)>0){



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
			'TakenBy'=>session('user.UniqId'),
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
					'redirectData'=>action('\B\ATMS\Controller@indexData'),
					

				];

				return response()->json($array, $status);


				





	


	}
}