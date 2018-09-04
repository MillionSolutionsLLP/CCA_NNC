<?php 
namespace MS\Core\Helper;

class Builder{


	public function __construct($namespace){

		$this->namespace=$namespace;
		$this->content='';
		$this->form_id="";
		$this->form=0;
		$this->index=0;
		$this->listData="";
		$this->listAction=[];
		$this->listGetter=[];
		$this->btn=[];
		$this->action_para=null;
		//$this->multiple=false;

		

	}

	public $title,$content,$action,$btn,$namespace,$listView,$listData;

	public static $layoutB ="B.L.Pages.Form_data";
	public static $layoutF ="B.L.Pages.Form_data";

	public static $layoutB_List="B.L.Pages.List_data_with_Paginate";
	public static $layoutF_List="B.L.Pages.List_data_with_Paginate";

	public function title($text){

		$this->title=$text;



		return $this;
	}

	public function listData($data,$data2=null){

		$this->listData=$data;

		$this->listExtraData=$data2;


		return $this;
	}

	public function listView($data){

		$this->listView=$data;

		//dd($this->listView);
		return $this;
	}

	public function listGetter($data){

		$this->listGetter=$data;

	}


	public function content($id,$data=[],$formdataArray=[]){

		
		$class=[
			'',
			$this->namespace,
			'Base'
		];



		$base=implode('\\', $class);

		if(count($data)>0){

			$formdata=$base::genFormData(true,$data,$id);			
			//dd($formdata);
		}else{

			if($id){
				$formdata=$base::genFormData(false,$data,$id);	
			}else{
				$formdata=$base::genFormData(false,$data);	
			}
			
		}


		

		if(isset($this->form_multiple))
		{

			
				foreach ($formdata as $key=>$value) {
					//dd($value);
					if(!array_key_exists('vName', $value))$value['vName']=$value['lable'];
					
					$value['name']=$value['name']."[]";
					//dd($value);
					$value['index']=$this->index;
					$formdata2[]=$value;

				}
				//dd($formdata2);
				$formdata=$formdata2;
			
			}

	

		//

			//if($this->content=='')$this->content="<div class=' col-lg-12'>";

		if($this->form>0){

			//$this->index=$this->index+count($formdata);

			foreach ($formdata as $key => $value) {
				$this->index=$this->index+1;
				$formdata[$key]['index']=$this->index;

			}


			if($this->form ==1){

			$this->content.="<div class='DynamicSection col-lg-12' ms-has-other='1' style='margin-left:0px;margin-right:0px;'>";
			$this->content.=\MS\Core\Helper\DForm::display($formdata,$formdataArray);


			}else{

			$this->content.="<div class='DynamicSection row' ms-has-other='1' style='margin-left:0px;margin-right:0px;'>";
			$this->content.=\MS\Core\Helper\DForm::display($formdata,$formdataArray);

			}
			}


		else{
		$this->index=$this->index+count($formdata);
		$this->content.="<div class='row' style='margin-left:0px;margin-right:0px;' >".\MS\Core\Helper\DForm::display($formdata,$formdataArray)."</div>";	
		}
		
		


		return $this;


	}

	public function action($method,$para=null){
		
		$class=[
			'',
			$this->namespace,
			'Controller'
		];

		$class=[
			implode('\\', $class),
			$method
		];
		$class=implode('@', $class);
		//dd($class);
		$this->action=$class;

		if($para!=null)$this->action_para=$para;

		return $this;

	}

	public function btn($array){

		$this->btn[]=$array;
		return $this;

	}

	public function js($array){
		$this->js=$array;
		return $this;
	}


	public function heading($array){

		foreach ($array as $key => $value) {
		$this->content.="<b><h4 class='col-lg-12 text-info'style='border-bottom-style: groove;  border-bottom-width: 0.5px;padding-bottom:5px;'><i class='fa fa-align-left 	fa-outdent fa-lg' aria-hidden='true'></i> ".$value."</h4></b>";
		return $this;
		}

	}

	public function table($vertical=true,$array,$cloumnArray=[],$class=[]){

		if(!array_key_exists('div-root-class', $class))$class['div-root-class']="col-lg-12";
		if(!array_key_exists('table-class', $class))$class['table-class']="table";


		$this->content.="<div class='".$class['div-root-class']."'>";

		$this->content.="<table class='".$class['table-class']."'>";

		if($vertical){
			$this->content.="<tr>";

			foreach ($cloumnArray as  $value) {
				
				$this->content.="<tr>";

				$this->content.="<th>";

				$this->content.=ucfirst($value);

				$this->content.="</th>";

				$this->content.="</tr>";
			}
		
			$this->content.="</tr>";

		}else{

			foreach ($array as $key => $value) {
				

				$this->content.="<tr>";

				$this->content.="<th>";

				$this->content.=ucfirst($key);

				$this->content.="</th>";

				$this->content.="<td>";

				$this->content.=ucfirst($value);

				$this->content.="</td>";

				$this->content.="</tr>";



			}


		}
		


		$this->content.="</table>";
		$this->content.="</div>";
		return $this;

	}


	public function note($text){
		$this->content.='<div class="alert alert-warning" role="alert">'.$text.'</div>';
		return $this;

	}


	public function extraFrom($id,$data=[]){

		$this->form=$this->form+1;

		if(array_key_exists('title', $data))
		$title=$data['title'];

		if (isset($title)) {



			if(array_key_exists('multiple', $data)){

			if($data['multiple']){
				$this->form_multiple=true;
				$this->form_id=preg_replace('/\s+/', '', $data['title']);

				if(array_key_exists('multipleAdd', $data)){

					if($data['multipleAdd']){

							$this->content.='<div class="col-lg-12"><h3>' .$title.'<span ms-input-count="1" ms-id="'.$this->form.'" class="btn btn-default btn-success glyphicon glyphicon-plus pull-right AddSectionBtn"></span></h3></div>';
					}else{
						goto end;
					}
				


				}else{

					end:
					$this->content.='<div class="col-lg-12"><h3>' .$title.'</h3></div>';

				}



			}

		    }

		
		}else{
			//$this->content.="<div class='col-lg-12'></div>";
		}
		
		$data2=[
			'form-class-div'=>"col-lg-4",
			//'form-class-id'=>$id

		];

		$cdata=[];



		if(array_key_exists('data', $data))

		{
				$cdata=$data['data'];
				if(is_array($cdata)){

					foreach ($cdata as $key => $value) {

						$this->content($id,$value,$data2);
						$this->content.="</div>";
					}

				}


		}else{

			$this->content($id ,$cdata,$data2);
			
			$this->content.="</div>";

		}


		
		

		return $this;


	}



	public function addListAction($data){





		if(array_key_exists('add',$data))$this->listAction['add-btn']=$data['add'];
		if(array_key_exists('edit',$data))$this->listAction['edit-btn']=$data['edit'];
		if(array_key_exists('delete',$data))$this->listAction['delete-btn']=$data['delete'];
		if(array_key_exists('view',$data))$this->listAction['view-btn']=$data['view'];
		if(array_key_exists('AllocationLater',$data))$this->listAction['AllocationLater-btn']=$data['AllocationLater'];
		if(array_key_exists('LoginasAgency',$data))$this->listAction['LoginasAgency-btn']=$data['LoginasAgency'];
		//if(array_key_exists('LoginasAgency',$data))$this->listAction['LoginasAgency-btn']=$data['LoginasAgency'];


		return $this;


	}
	

	public function view ($backend=true,$type="form"){


		// if($this->form_multiple)$this->content=$this->content.'<span ms-id="'.$this->form.'" class="btn btn-default btn-danger glyphicon glyphicon-remove pull-right RemoveSectionBtn"></span>';



switch ($type) {
	case 'form':
				$data=[

			'form-title'=>$this->title,
			'form-content'=>$this->content,//."</div>",
			'form-action'=>$this->action,
			"form-btn"=>$this->btn,
			//"form-js"=>$this->js

		];

		//dd($this->action_para);
		if($this->action_para!=null)$data['form-action-para']=$this->action_para;

		if($this->form>0)$data['form-content']=$data['form-content'];


		if(isset($this->js))$data["form-js"]=$this->js;

		if($backend){

			return view(self::$layoutB)->with('data',$data);
		}

		return view(self::$layoutF)->with('data',$data);
	

		break;


	case 'list':


		

		$on1=0;
		$cloumn=[];

		foreach ($this->listData as $value) {


		if(!$on1){
			$cloumn =$value->getfillable();

			$on1=1;
		}
		
		}	
		
	//	dd($value);			
		
		

		$data=[

			'List-title'=>$this->title,
			'List-array'=>$this->listView,
			'List-display'=>$cloumn,	
			'List-Paginate'=>$this->listData,
			'List-btn'=>$this->btn,
			'List-action'=>$this->listAction,
			'List-dynamic-column'=>$this->listGetter,
			'Module-Namespace'=>$this->namespace,
			'List-extraData'=>$this->listExtraData,

			//."</div>",
			
			//"form-js"=>$this->js

		];







		//dd($data);
		

		if($backend){
			//dd(view(self::$layoutB_List)->with('data',$data));
			return view(self::$layoutB_List)->with('data',$data);
		}

		return view(self::$layoutB_List)->with('data',$data);
	


		break;

	
	default:
		# code...
		break;
}




}
}

?>