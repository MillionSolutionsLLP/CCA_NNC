<?php
namespace B\ATMS;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     
		$this->middleware('agencyAdmin');
        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){



		//Base::migrate([ ['id'=>3] ]);


			$data=[

			

			];
		return view('ATMS.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




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

		return view('TMS.V.Object.TaskDetails')->with('data',$data);
	}



	public function taskUploadById($UniqId){

		$uniqId=\MS\Core\Helper\Comman::de4url($UniqId);
		//dd($uniqId);



			$id=2;
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



	}
}