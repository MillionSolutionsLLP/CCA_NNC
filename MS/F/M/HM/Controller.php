<?php
namespace F\HM;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){




			$data=[

			

			];
		return view('HM.V.Pages.Home')->with('data',$data);
		
		
	}


	public function contactUs(){




			$data=[

			

			];
		return view('HM.V.Pages.ContactUs')->with('data',$data);
		
		
	}


	public function aboutUs(){



			$data=[

			

			];
		return view('HM.V.Pages.AboutUs')->with('data',$data);

	}


	
	public function news(){



			$data=[

			

			];
		return view('HM.V.Pages.AboutUs')->with('data',$data);

	}




}