<?php
namespace B\Panel;

class Controller extends \App\Http\Controllers\Controller
{

	public function __construct(){
     

        $this->middleware('backend');
    }


	public function index(){
		
		
		return view('Panel.V.home');
	}

	public function index_data(){

		$data=[];
		return view('Panel.V.panel_data')->with('data',$data);

	
	}



		public function index_mod_data(){

		$data=[];
		return view('Panel.V.Object.MasterDetails')->with('data',$data);

	
	}

	

}