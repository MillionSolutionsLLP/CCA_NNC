<?php
namespace B\NM;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){



	//	Base::migrate([['id'=>2]]);
			$data=[

			

			];
		return view('NM.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('NM.V.Object.MasterDetails')->with('data',$data);
		
		
	}

	public function addNews(){

		$id=0;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add News")->content($id)->action("addNews")->btn([
								'action'=>"\\B\\NM\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							])->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							])->js(["NM.J.news"])->extraFrom(1,['title'=>'Attachments','multiple'=>true,'multipleAdd'=>true]);


		return $build->view();



	}
	public function addNewsPost(R\AddNews $r){


			$status=200;
			$tableId=2;
			$rData=$r->all();
			$filePath=[];
			$FileNo=0;
			//dd();
			if(array_key_exists('Attachments',$rData)){
				
				
				foreach ($rData['Attachments'] as  $value) {
					
					$filePath[ $rData['UniqId'].$FileNo]=$value->storeAs($rData['UniqId'], $rData['UniqId'].$FileNo.'.'.$value->clientExtension(), 'NM');

					
					$FileNo++;
				}

			}
			
	
			if($FileNo > 0 ){$FileNo=true;}else{$FileNo=false;}

			if($rData['Status']){$rData['Status']=true;}else{$rData['Status']=false;}


			$arraReturn=[
'UniqId'=>$rData['UniqId'],

'NewsTitle'=>$rData['NewsTitle'],

'NewsContent'=>$rData['NewsContent'],

'NewsDate'=>$rData['NewsDate'],

'NewsDateExp'=>$rData['NewsDateExp'],

'NewsFileAttchments'=>$FileNo,

'NewsFileArray'=>collect($filePath)->toJson(),

'Status'=>$rData['Status'],

			];


			//dd($arraReturn);
			

			$model=new Model($tableId);
			$return=$model->MS_add($arraReturn,$tableId);








			$array=[
					'msg'=>"OK",
			 		'redirectData'=>action('\B\NM\Controller@indexData'),
			 		//'data'=>$input,
			 		'array'=>$return

				];

	
		 return response()->json($array, $status);



	}
	public function editNews($UniqId){}
	public function editNewsPost(){}
	public function viewNews(){

		$tableId=2;

		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
		$build->title("View All News");
	//	

		$model=new Model($tableId);
		$model=$model->paginate(5);
	//	dd($model);

		$diplayArray=[
//'UniqId'=>'ID',

'NewsTitle'=>'Title',


//'NewsDate'=>'Date',

'NewsDateExp'=>'Exp. Date',

'NewsFileAttchments'=>'Files',


'Status'=>'Live',

		];





		$build->listData($model)->listView($diplayArray)->btn([
								'action'=>"\\B\\NM\\Controller@addNews",
								'color'=>"btn-info",
								'icon'=>"fa fa-plus",
								'text'=>"Add News"
							])->addListAction($link);	

		return $build->view(true,'list');

	}
	public function viewNewsbyId($UniqId){}
	

}