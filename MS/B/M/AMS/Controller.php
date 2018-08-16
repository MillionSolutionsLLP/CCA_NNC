<?php
namespace B\AMS;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     
		$this->middleware('backend')->except(['hookAgencyLoginPost']);
        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){
		//dd(session()->all());



			$data=[

			

			];
		return view('AMS.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('AMS.V.Object.MasterDetails')->with('data',$data);
		
		
	}



	public function hookAgencyLoginPost(R\LoginAgency $r){


		
		//dd($psw);
		$input=$r->input();

		$model=new Model();

		$row=$model->where('Username',$input['UserName']);


		if($row->first()!=null){


	     $psw=\MS\Core\Helper\Comman::de($row->pluck('Password')->first(), ENCRYPTION_KEY);
	    //$name=$row->pluck('FirstName')->first()." ".$row->pluck('LastName')->first();
	    $agency=[];

	    if($psw == $input['Password']){

	    $id=$row->pluck('id');
	   
	   // dd($psw);
	    $agency['number']=$row->pluck('AttConatctNo')->first();
	    $agency['email']=$row->pluck('AttConatctNo')->first();
		$agency['name']=$row->pluck('Name')->first();
		$agency['jobs']=json_decode($row->pluck('AllocatedJobs')->first(),true,10);


		$status=200;
			$array=[
					'redirect'=>route('APanel.Index'),	

				];
		
		   session(['user' => [
	       
	        'id'=>$id->first(),
	        'userData'=>$agency,
	        'SuperAdmin'=>0,
	        'AgencyAdmin'=>1,
	        ] ]);

				//return redirect()->action("\B\APanel\Controller@index");
		

	    }else{
			$status=422;
			$array=[
					'msg'=>[
					'Password is not valid.',
						

					],

					

				];

	    }

	

		}

		

	
		 return response()->json($array, $status);
		exit();


	}




	function agencyAdd(){
//Base::migrate([['id'=>'0']]);
	

			$id=1;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add Agency")->heading(['Basic Details of Agency'])->content($id)->action("agencyAdd")->btn([
								'action'=>"\\B\\AMS\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							])->heading(['Conern Person Details'])->extraFrom('2')->heading(['Login Details For Agency'])->extraFrom('3')->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							]);


		return $build->view();
	}



	public function agencyAddPost(R\AddAgency $r){



			$status=200;
			$tableId=0;
			$rData=$r->all();
			if(array_key_exists('ConfirmPassword', $rData))unset( $rData['ConfirmPassword']);
			if(array_key_exists('Password', $rData))$rData['Password']=\MS\Core\Helper\Comman::en($rData['Password']);



			$model=new Model($tableId);
			$return=$model->MS_add($rData,$tableId);





			


			$array=[
					'msg'=>"OK",
			 		'redirectData'=>action('\B\AMS\Controller@indexData'),
			 		//'data'=>$input,
			 		'array'=>$return

				];

	
		 return response()->json($array, $status);


	}


	public function agencyView(){


				$tableId=0;

		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
		$build->title("View All Agency");
	//	

		$model=new Model($tableId);
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

			'delete'=>[
				'method'=>'AMS.Agency.Delete.Id',
				'key'=>'UniqId',

			],

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

						return $build->view(true,'list');

	}


	public function agencyViewbyId($UniqId){



		$uniqId=\MS\Core\Helper\Comman::de4url($UniqId);
		//$uniqId=$enUniqId;
		$id=0;
		$m=New \B\AMS\Model();

		if($m->where('UniqId',$uniqId)->first()!=null){$agencyData=$m->where('UniqId',$uniqId)->first()->toArray();}
		else{$agencyData=[];}
		$data=[

			'agency'=>$agencyData
		];
		//dd($m->where('UniqId',$uniqId)->first());
	//	dd($newsData);

		return view('AMS.V.Object.AgencyDetails')->with('data',$data);
		//dd($m->where('UniqId',$uniqId)->first()->toArray());




	}


	public function agencyEditbyId($UniqId){


			$id=4;
			$model=new Model($id);
			$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
			//dd($model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray());
			
			$nullCheck=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first();
			//dd($nullCheck);
			if($nullCheck =! null ){
				$data=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first();
			}else{
				$data=[];
			}
			
			
//			dd($data);

			$build->title("Edit Agency ")->content($id,$data)->action("agencyEditbyIdPost");

			$build->btn([
									'action'=>"\\B\\AMS\\Controller@agencyView",
									'color'=>"btn-info",
									'icon'=>"fa fa-fast-backward",
									'text'=>"Back"
								]);
			$build->btn([
									//'action'=>"\\B\\MAS\\Controller@editCompany",
									'color'=>"btn-success",
									'icon'=>"fa fa-floppy-o",
									'text'=>"Save"
								]);

			return $build->view();


	}

	public function agencyEditbyIdPost(R\EditAgency $r){


			$status=200;
			$rData=$r->all();

			//dd($rData);
			$id=0;

			if($rData['Password']==null || $rData['Password']=="" ){unset($rData['Password']);}else{
				$rData['Password']=\MS\Core\Helper\Comman::en($rData['Password']);

			}


//			dd($rData);



			$model=new Model($id);
			$model->MS_update($rData,$id);	

			



			//return ;
			$array=[
	 		'msg'=>"OK",
	 	//	'redirect'=>action('\B\Users\Controller@login_form_otp'),
	 		'redirectData'=>action('\B\AMS\Controller@agencyView'),

	 		// 	'db Password'=>$psw,
	 		// 'in Password'=>$input['Password']
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);



	}
	public function agencyDeletebyId($UniqId){

			$UniqId=\MS\Core\Helper\Comman::de4url($UniqId);
			$status=200;
			$tableId=0;
			$rData=['UniqId'=>$UniqId];
			$model=new Model($tableId);
			//$fileExist=(boolean)$model->where('UniqId',$UniqId)->first()['NewsFileAttchments'];
			//$disk=\Storage::disk('NM');
			$model->MS_delete($rData,$tableId);	
			//if($fileExist)$disk->deleteDirectory($UniqId);
			return  $this->agencyView();

	}
}