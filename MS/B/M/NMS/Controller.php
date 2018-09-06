<?php
namespace B\NMS;

use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){




			$data=[

			

			];
		return view('NMS.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('NMS.V.Object.MasterDetails')->with('data',$data);
		
		
	}


	public function checkNotification(Request $r, $UserId,$NotificationCount=0){


		$m=new Model(3,session('user.userData.UniqId'));

		$data=$m->where('Read','0')->get()->first();
		//dd($data);
		$dataAll=$m->MS_all();

		//dd($r->all());



		if ($data==null && count($dataAll)==$NotificationCount ) {
					
					$status=422;
					$array=[
							'msg'=>"No Notification",
							'countCheck'=>count($dataAll)
					 		
					 		
						];

		}else{

			$status=200;
					$array=[
							'msg'=>"New Notification",
							'dData'=>$m->where('Read','0')->get()->toArray(),
							'countCheck'=>count($dataAll)
					 		
					 		
						];


		}

		
	
		 return response()->json($array, $status);

		dd($data);

	}

}