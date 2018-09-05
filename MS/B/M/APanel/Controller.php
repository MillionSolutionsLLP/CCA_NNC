<?php
namespace B\APanel;

use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     
		 $this->middleware('agencyAdmin')->except(['login_form']);
        //$this->middleware('groupname')->except(['method_name']);
    }






	public function login_form(){
		return view('APanel.V.Pages.login_form')	;
	}



	public function index(){

\MS\Core\Helper\Comman::DB_flush();


			$data=[

			

			];

		return view('APanel.V.Pages.home')->with('data',$data);

	//	return view('APanel.V.panel_data')->with('data',$data);
		
		
	}
public function indexDataWithSide(){
\MS\Core\Helper\Comman::DB_flush();

			$data=[

			

			];

		//return view('APanel.V.Pages.home')->with('data',$data);

	return view('APanel.V.panel_data')->with('data',$data);
		


}




	public function indexData(){

\MS\Core\Helper\Comman::DB_flush();


			$data=[

			

			];
		return view('APanel.V.Object.MasterDetails')->with('data',$data);
		
		
	}


	public function logout(Request $r){
		$r->session()->flush();
		return redirect()->action("\B\APanel\Controller@index");
	}

}