<?php
namespace B\Users;

use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        $this->middleware('backend')->except(['login_form','login_post','login_form_otp','login_otp_post','login_form_for_agency']);
    }
	public function index(){
		// $encrypt=\MS\Core\Helper\Comman::en('9662611234', ENCRYPTION_KEY);
		// var_dump($encrypt);
		// dd(\MS\Core\Helper\Comman::de($encrypt, ENCRYPTION_KEY));
		//return view('Users.V.add_form')	;
		//$model=new Model();
		


		dd(session('user'));

	}

	public function login_form(){
		return view('Users.V.login_form')	;
	}


	public function login_post(Request $r){
		$input=$r->all();
		$val=\Validator::make($input, [
	 	'UserName'=>'required|exists:MSDBC.Users,Username',
	 	'Password'=>'required',
	 	]
	 	);
	 	if ($val->fails()) {
	 		$status=403;
	 		$array=[
	 		'msg'=>$val->errors()->getMessages(),
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
        }

         $model=new Model();

	    $row=$model->where('Username',$input['UserName']);

	    $id=$row->pluck('id');
	    $psw=\MS\Core\Helper\Comman::de($row->pluck('Password')->first(), ENCRYPTION_KEY);
	   // dd($psw);
	    $number=$row->pluck('MobileNumber')->first();
	    $email=$row->pluck('Email')->first();
	    $name=$row->pluck('FirstName')->first()." ".$row->pluck('LastName')->first();

	    if($psw == $input['Password']){

	    	$model2=new Model();    
	    $RT=\MS\Core\Helper\Comman::random(4);

	    session(['user' => [
	        'OTP'=>$RT,
	        'id'=>$id->toArray()[0],
	        'OV'=>false,
	      //  'UniqId'=>$row->pluck('UniqId')->first(),
	        ] ]);
	   // \MS\Core\Helper\SMS::sendOTP($number,$RT);

			$data2=[
			'link'=>url("status"),
			'code'=>$RT,
			'name'=>$name,
			];

// 	    \Mail::send('B.M.Users.V.otp_email', $data2, function($message) use ($email,$name) {
//     $message->to($email,$name)->subject('GUDM Recruitment 2017');
// });
	    $row2=$model2->where('id', $id)
	            ->update(['OTP' => $RT]);

	            session(['user' => [
	        'OTP'=>session('user')['OTP'],
	        'id'=>session('user')['id'],
	        'OV'=>true,
	        'userData'=>[
	        	'name'=>$name,
	        	'email'=>$email,
	        	'UniqId'=>$row->pluck('UniqId')->first(),
	        ],
	        'SuperAdmin'=>1,
	        ] ]);  

	    }else{
	    	$status=403;
	    	$array=[
	 		'msg'=>"Password Did not matched",
	 	
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
	    }

	    $status=200;

		$array=[
	 		'msg'=>"Verify OTP",
	 		'redirect'=>action('\B\Users\Controller@login_form_otp'),
	 		// 	'db Password'=>$psw,
	 		// 'in Password'=>$input['Password']
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
	    
	     
		

	}

	public function login_form_otp(Request $r){

		if(!$r->session()->get('user')['OV']){
           
           return view('Users.V.login_form_otp')	;

           // return back()->withInput();
     
        }else{
        	return redirect()->action("\B\Panel\Controller@index");

        }
	
	}

	public function login_otp_post(Request $r){
		$input=$r->all();
		$otp=session('user')['OTP'];
		
		 session(['user' => [
	        'OTP'=>session('user')['OTP'],
	        'id'=>session('user')['id'],
	        'OV'=>true,
	        ] ]);

		$val=\Validator::make($input, [
		 	'OTP'=>'required',		 	
		 	]
		 	);
		if ($val->fails()) {
	 		$status=403;
	 		$array=[
	 		'msg'=>$val->errors()->getMessages(),
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
        }

        if($otp ==$input['OTP'])	{
        		    $status=200;

		$array=[
	 		'msg'=>"Verify OTP",
	 		'redirect'=>action('\B\Panel\Controller@index'),
	 		// 	'db Password'=>$psw,
	 		// 'in Password'=>$input['Password']
	 		];
	 		$json=collect($array)->toJson();
	 		
        }else{
        $status=403;

		$array=[
	 		'msg'=>"Wrong OTP",
	 		'redirect'=>action('\B\Users\Controller@login_form_otp'),
	 		'db Password'=>$otp,
	 		'in Password'=>$input['OTP']
	 		];
	 		$json=collect($array)->toJson();
        }

        return response()->json($array, $status);
	}

	public function logout(Request $r){
		$r->session()->flush();
		return redirect()->action("\B\Panel\Controller@index");
	}

	public function add_form(){

		$formData=Base::genFormData();

		//dd($formData);
    	$form=\MS\Core\Helper\DForm::display($formData);

    	       $btn=[
	    [
	    'icon'=>'fa fa-arrow-left',
	    'text'=>'Back',
	    'action'=>'\B\Users\Controller@index',
	    ],

	     [
	    'icon'=>'fa fa-floppy-o',
	    'text'=>'Save',
	    ]
	    ,

    ];
    
    $data=[
    'form-icon'=>'fa fa-user',
    'frm-action'=>'\B\Users\Controller@add_form_post',
    'form-title'=>'Add User',
    'form-content'=>$form,
    'form-btn'=>$btn,
    'breacrumb'=>[
    		

    				[
    			'icon'=>'fa fa-bullhorn',
    			'text' =>'Announcements',
    			'actionlink' =>'\B\Users\Controller@index',],
    				

    				[
    				'icon'=>'fa fa-plus-square',
    			'text' =>'Add',
    				],
    				
    				],

    ];
    	
		
		return view('B.L.Pages.Form')->with('data',$data)	;
	}





	public function add_form_post(Request $r){
	
	$input=$r->all();
	if(array_key_exists('Password', $input))$input['Password']=\MS\Core\Helper\Comman::en($input['Password'], ENCRYPTION_KEY);
	$val=\Validator::make($input, [
	
	 	'FirstName'=>'required',
	 	'LastName'=>'required',
	 	'UserName'=>'required',
	 	'Password'=>'required',
	 	'OTP'=>'required',
	 	'AC'=>'required',
	 	]
	 	);

	 if ($val->fails()) {
	 		$status=200;
	 		$array=$val->errors()->getMessages();
	 		//dd($array);
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);
        }		


		$model=new Model();
		//\MS\Core\Helper\SMS::sendOTP('9662611234',$input['OTP']);
		dd($model->MS_add($input));
		//return $model->MS_add($input);
	}



	public function editUser($UniqId){
			$id=0;
			$model=new Model();
			$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
			//dd($model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray());
			
			$nullCheck=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first();
			//dd($nullCheck);
			if($nullCheck =! null ){
				$data=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray();
			}else{
				$data=[];
			}

			if(array_key_exists('Password',$data))$data['Password']=\MS\Core\Helper\Comman::en($data['Password'], ENCRYPTION_KEY);
			$text="After clicking save it will automatically sign out you from Current Session.";
			$build->title("Edit User")->content($id,$data)->note($text)->action("editUserPost");

			$build->btn([
									'action'=>"\B\Panel\Controller@index_data",
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

		//	$build->content="<div class='ms-mod-tab'>".$build->content."</div>";

			//dd($build->content);
			return "<div class='ms-mod-tab'>".$build->view()."</div>";
	}


	public function editUserPost(R\editUser $r){




			$id=0;
			$status=200;
			$rData=$r->all();


			// if(array_key_exists('Password',$rData))$rData['Password']=\MS\Core\Helper\Comman::de($rData['Password'], ENCRYPTION_KEY);
			$model=new Model();

			$user=$model->where('UniqId',$rData['UniqId'])->get()->first()->toArray();
			if($user['Password']!=$rData['Password']){

				$rData['Password']=\MS\Core\Helper\Comman::en($rData['Password']);

			}

			
			$model->MS_update($rData,$id);	
			$array=[
	 		'msg'=>"OK",
	 		'redirectLink'=>action('\B\Users\Controller@logout'),
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);


	}

}