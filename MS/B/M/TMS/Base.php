<?php
namespace B\TMS;


use \Illuminate\Http\Request;





class Base{


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $controller="\B\TMS\Controller";
public static $model="\B\M\TMS\Model";


public static $routes=[
						[
						'name'=>'TMS.Data',
						'route'=>'/',
						'method'=>'index',
						'type'=>'get',
						],

						[
						'name'=>'TMS.index.Data',
						'route'=>'/data',
						'method'=>'indexData',
						'type'=>'get',
						],

						[
						'name'=>'TMS.Task.Add',
						'route'=>'/task/add',
						'method'=>'taskAdd',
						'type'=>'get',
						],

						[
						'name'=>'TMS.Task.Add.Post',
						'route'=>'/task/add',
						'method'=>'taskAddPost',
						'type'=>'post',
						],


						[
						'name'=>'TMS.Task.View',
						'route'=>'/task/view',
						'method'=>'taskView',
						'type'=>'get',
						],

						[
						'name'=>'TMS.Task.View.Id',
						'route'=>'/task/view/{UniqId}',
						'method'=>'taskViewById',
						'type'=>'get',
						],


						[
						'name'=>'TMS.Task.Delete.Id',
						'route'=>'/task/delete/{UniqId}',
						'method'=>'taskDeleteById',
						'type'=>'get',
						],


						[
						'name'=>'TMS.Task.Approve.Id',
						'route'=>'/task/approve/{UniqId}/step/{StepId}',
						'method'=>'taskApproveById',
						'type'=>'get',
						],


							[
						'name'=>'TMS.Task.Gen.Allocation',
						'route'=>'/task/gen/allocationLatter/{UniqId}',
						'method'=>'taskGenAllocationLatterById',
						'type'=>'get',
						],


						[
						'name'=>'TMS.Task.Get.File.Name',
						'route'=>'task/uploadedDoc/{UniqId}/{TaskId}/{StepId}/{TypeOfDocument}/{FileName}',
						'method'=>'getUploadedFile',
						'type'=>'get',
						],


						[
						'name'=>'TMS.Task.Rise.Step.Query',
						'route'=>'/task/query/{TaskId}/{StepId}',
						'method'=>'riseQuery',
						'type'=>'get',
						],


						[
						'name'=>'TMS.Task.Rise.Step.Query.Post',
						'route'=>'/task/query/{TaskId}/{StepId}',
						'method'=>'riseQueryPost',
						'type'=>'post',
						],





					];

public static $tableNo="0";



//public static $connection ="MSDBC";

public static $allOnSameconnection=false;



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table="TMS_Task_Master";

public static $connection ="TMS_Master";

public static $tableStatus=false;

public static $field=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','data'=>['input-size'=>'col-lg-2']],


['name'=>'HireAgencyCode','vName'=>'Agency Code','type'=>'string','input'=>'text','link'=>'AMS:0','data'=>['input-size'=>'col-lg-2']  ],


['name'=>'NameOperator','vName'=>'Name of Operator','type'=>'string','input'=>'text', 'link'=>'TMS:0' ,'data'=>['input-size'=>'col-lg-4']],

['name'=>'NameOwner','vName'=>'Name of Owner/Partner','type'=>'string','input'=>'text', 'link'=>'TMS:0' ,'data'=>['input-size'=>'col-lg-4']],

['name'=>'NameOperatorAddress1','vName'=>'Address of Operator Line 1','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-4']],

['name'=>'NameOperatorAddress2','vName'=>'Address of Operator Line 2','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-4'] ],

['name'=>'NameOperatorAddress3','vName'=>'Address of Operator Line 3','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-4'] ],

['name'=>'NameOperatorCity','vName'=>"City located Operator's Headqurter",'type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-3']  ],

['name'=>'NameOperatorDistrict','vName'=>'District of Operator','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],

['name'=>'NameOperatorState','vName'=>'State of Operator','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],

['name'=>'NameOperatorPincode','vName'=>'Pincode of Operator','type'=>'string','input'=>'number', 'data'=>['input-size'=>'col-lg-3']],


['name'=>'AreaPiracy','vName'=>'Area of Piracy','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],

['name'=>'ModePiracy','vName'=>'Mode of Piracy','type'=>'string','input'=>'text','link'=>'TMS:0' ,'data'=>['input-size'=>'col-lg-3'] ],

['name'=>'IllegalTypeBroadcasting','vName'=>'Illegal broadcasting','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],


['name'=>'StatusOperator','vName'=>'Status of Operator','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],


['name'=>'NameOfNetwork','vName'=>'Name of Network/LCO','type'=>'string','input'=>'text','link'=>'TMS:0'  ],

['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////






////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table1="TMS_Task_";

public static $connection1 ="TMS_Data";

public static $tableStatus1=false;

public static $field1=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],

['name'=>'TypeOfAction','type'=>'string','input'=>'text',  ],


['name'=>'DocumentUploaded','type'=>'boolean','input'=>'boolean',  ],
['name'=>'DocumentArray','type'=>'string','input'=>'text',  ],

['name'=>'DocumentVerified','type'=>'boolean','input'=>'text',  ],
['name'=>'DocumentVerifiedArray','type'=>'string','input'=>'text',  ],

['name'=>'DocumentQuery','type'=>'boolean','input'=>'text',  ],
['name'=>'DocumentQueryArray','type'=>'string','input'=>'text',  ],

['name'=>'DocumentReply','type'=>'boolean','input'=>'text',  ],
['name'=>'DocumentReplyArray','type'=>'string','input'=>'text',  ],

['name'=>'QueryRisedBy','type'=>'string','input'=>'text',  ],
['name'=>'VerifiedBy','type'=>'string','input'=>'text',  ],
['name'=>'TakenBy','type'=>'string','input'=>'text',  ],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table2="TMS_LCO_Master";

public static $connection2 ="TMS_Master";

public static $tableStatus2=false;

public static $field2=[


['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],

['name'=>'NameOfLCO','vName'=>'Name of Operator','type'=>'string','input'=>'text',  ],

['name'=>'LastNameOfOperator','vName'=>'Name of Owner/Partner','type'=>'string','input'=>'text',  ],

['name'=>'LastModeoPiracy','vName'=>'Area of Piracy','type'=>'string','input'=>'text',  ],

['name'=>'NameOfOperatorArray','vName'=>'Illegal broadcasting','type'=>'string','input'=>'text',  ],

['name'=>'ModeoPiracyArray','vName'=>'Status of Operator','type'=>'string','input'=>'text',  ],


];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table3="TMS_NameOfOperator_Master";

public static $connection3 ="TMS_Master";

public static $tableStatus3=false;

public static $field3=[


['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],

['name'=>'NameOfOperator','vName'=>'Name of Operator','type'=>'string','input'=>'text',  ],

['name'=>'NameOfOwner','vName'=>'Name of Owner/Partner','type'=>'string','input'=>'text',  ],

['name'=>'LastModeOfPiracy','vName'=>'Area of Piracy','type'=>'string','input'=>'text',  ],

['name'=>'LastModeOfPiracyArray','vName'=>'Status of Operator','type'=>'string','input'=>'text',  ],

['name'=>'LastStatusOfOperator','vName'=>'Illegal broadcasting','type'=>'string','input'=>'text',  ],

['name'=>'LastStatusOfOperatorArray','vName'=>'Illegal broadcasting','type'=>'string','input'=>'text',  ],



];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table4="TMS_StatusOfOperator_Master";

public static $connection4 ="TMS_Master";

public static $tableStatus4=false;

public static $field4=[


['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],

['name'=>'NameOfStatus','vName'=>'Name of Operator','type'=>'string','input'=>'text',  ],

['name'=>'booleanValue','vName'=>'Name of Owner/Partner','type'=>'string','input'=>'text',  ],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table5="TMS_ModeOfPiracy_Master";

public static $connection5 ="TMS_Master";

public static $tableStatus5=false;

public static $field5=[


['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],

['name'=>'NameOfPiracy','vName'=>'Name of Operator','type'=>'string','input'=>'text',  ],

['name'=>'booleanValue','vName'=>'Name of Owner/Partner','type'=>'string','input'=>'text',  ],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table6="TMS_ActionType";

public static $connection6 ="TMS_Master";

public static $tableStatus6=false;

public static $field6=[


['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID',],

['name'=>'NameOfAction','type'=>'string','input'=>'text',  ],

['name'=>'booleanValue','type'=>'string','input'=>'text',  ],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table7="TMS_Task_Master";

public static $connection7 ="TMS_Master";

public static $tableStatus7=false;

public static $field7=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','data'=>['input-size'=>'col-lg-2']],


['name'=>'HireAgencyCode','vName'=>'Agency Code','type'=>'string','input'=>'text','link'=>'AMS:0','data'=>['input-size'=>'col-lg-2']  ],


['name'=>'NameOperator','vName'=>'Name of Operator','type'=>'string','input'=>'text', 'link'=>'TMS:0' ,'data'=>['input-size'=>'col-lg-4']],

['name'=>'NameOwner','vName'=>'Name of Owner/Partner','type'=>'string','input'=>'text', 'link'=>'TMS:0' ,'data'=>['input-size'=>'col-lg-4']],

['name'=>'NameOperatorAddress1','vName'=>'Address of Operator Line 1','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-4']],

['name'=>'NameOperatorAddress2','vName'=>'Address of Operator Line 2','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-4'] ],

['name'=>'NameOperatorAddress3','vName'=>'Address of Operator Line 3','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-4'] ],

['name'=>'NameOperatorCity','vName'=>"City located Operator's Headqurter",'type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-3']  ],

['name'=>'NameOperatorDistrict','vName'=>'District of Operator','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],

['name'=>'NameOperatorState','vName'=>'State of Operator','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],

['name'=>'NameOperatorPincode','vName'=>'Pincode of Operator','type'=>'string','input'=>'number', 'data'=>['input-size'=>'col-lg-3']],


['name'=>'AreaPiracy','vName'=>'Area of Piracy','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],

['name'=>'ModePiracy','vName'=>'Mode of Piracy','type'=>'string','input'=>'text','link'=>'TMS:0' ,'data'=>['input-size'=>'col-lg-3'] ],

['name'=>'IllegalTypeBroadcasting','vName'=>'Illegal broadcasting','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],


['name'=>'StatusOperator','vName'=>'Status of Operator','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],


['name'=>'NameOfNetwork','vName'=>'Name of Network/LCO','type'=>'string','input'=>'text','link'=>'TMS:0'  ],

['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

['name'=>'CurrentStatus','vName'=>'Illegal broadcasting','type'=>'string','input'=>'text', 'data'=>['input-size'=>'col-lg-3'] ],


];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////


////////////////////////////////////
/////////////////////////////////////
//MODEL CALLBACK FUNCTIONS///////////
///////////////////////////////////
/////////////////////////////////




public static function status(){
	return [
	'Open','Close'
	];
}










//////////////////////////////
//////////////////////////////
//DO NOT EDIT BELOW///////////
////////////////////////////
//////////////////////////



public static  function genFormData($edit=false,$data=[],$id=false){
	
	$array=[];
	if($edit and count($data)>0){

		$model=new Model($id);
		
		//dd($model);
		
		if(gettype($data) == 'object')$data=$data->toArray();


		

		$v=$model->where(array_keys($data)[0],$data[array_keys($data)[0]])->first();

		if($v!=null){
			$v=$v->toArray();
		}
		//dd($v);

		if($id){
		
				$field="field".$id;
				foreach (self::$$field as $value) {
				
				//var_dump($value);
				if(array_key_exists($value['name'], $v)){

					$value['value']=$v[$value['name']];		
				
				}

				$data=self::genFieldData($value);
					
				$unset=['default'];
				foreach ($unset as $value1) {
						unset($data[$value1]);
					}

				if($data!=null and count($data)>2)$array[]=$data;	
			}
			


			}else{

				foreach (self::$field as $value) {

				//if(array_key_exists('callback', $value))unset($value['callback']);
				$value['value']=$v[$value['name']];
				//$test[]=$value;
				$data=self::genFieldData($value);
				if($data!=null)$array[]=self::genFieldData($value);	
				}
			}

		
		if(count($data)==1){

	

			
		}

		
		
			
	}else{

		if($id){
			$field="field".$id;
			foreach (self::$$field as $value) {
				$data=self::genFieldData($value);
				if($data!=null)$array[]=self::genFieldData($value);		
				}


		}else{

				foreach (self::$field as $value) {
				$data=self::genFieldData($value);
				if($data!=null)$array[]=self::genFieldData($value);		
				}


		}
		

	}

	
	return $array;
}


public static function genUniqID(){
	//if($this->where(''))
	return \MS\Core\Helper\Comman::random(2,1);
}


public static function getTable($id=false){
	if($id){
		$table='table'.$id;
		return self::$$table;
		}else{
			return self::$table;
			
		
	}
}

public static function getTableStatus($id=false){
	if($id){
		$table='tableStatus'.$id;

		return self::$$table;
		}else{
			return self::$tableStatus;
			
		
	}
}

public static function getConnection($id=false){
	if($id){

		if(self::$allOnSameconnection){
			$connection='connection';
			}else{
			$connection='connection'.$id;
			}

		if(isset(self::$$connection))
		return self::$$connection;
		return self::$connection;
		}else{
		return self::$connection;
	}
}

public static function getField($id=false){
	if($id){
		
		$field='field'.$id;
		return self::$$field;
	}else{
	return self::$field;	
	}
	
}


public static function seed(){
	return \DB::connection(self::getConnection())->table(self::getTable());
}

public static function migrate($data=[]){
	
			
			if(count($data)>0){

				
				foreach ($data as $key => $value) {
							
							if(array_key_exists('id', $value)){

								$id=$value['id'];
								$table=self::getTable($id);
								$field=self::getField($id);	


								if(array_key_exists('code', $value)){

									$table.=$value['code'];

								}
								
								if(self::$allOnSameconnection){
								$connection=self::getConnection();
								}else{
								$connection=self::getConnection($id);	
								}



								if(!\Schema::connection($connection)->hasTable($table)){
								
								\MS\Core\Helper\Comman::makeTable($table,$field,$connection);



								}


								
							}


			

				}


								return [

									'id'=>$id,
									'tableName'=>$table,
									'connection'=>$connection,
								];						


			}else{

			$tableNo=self::$tableNo;
			$tableName="table";
			$fieldName="field";
			$connectionName="connection";

			for ($i=0; $i < $tableNo+1 ; $i++) { 
			
			$id=$i;
			$table=self::getTable($id);
			$field=self::getField($id);

			if(self::$allOnSameconnection){
			$connection=self::getConnection();
			}else{
			$connection=self::getConnection($id);	
			}

			if(self::getTableStatus($id))\MS\Core\Helper\Comman::makeTable($table,$field,$connection);
			

			}


			

			

		}

}

public static function rollback($data=[]){


	if(count($data)>0){


				
				foreach ($data as $key => $value) {
							
							if(array_key_exists('id', $value)){

								$id=$value['id'];
								$table=self::getTable($id);
								


								if(array_key_exists('code', $value)){

									$table.=$value['code'];

								}
								
								if(self::$allOnSameconnection){
								$connection=self::getConnection();
								}else{
								$connection=self::getConnection($id);	
								}


								\MS\Core\Helper\Comman::deleteTable($table,$connection);
								
							}


			

				}						


			}
		

	
}






public static function genFieldData($data){
	$array=[];

	if (array_key_exists('value', $data)) {
		if($data != null){
			$value=$data['value'];
		}
	}

	switch ($data['input']) {
		case 'text':

			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if (array_key_exists('link', $data)) {
				$array['link']=[

				'mod'=>explode(':', $data['link'])[0] ,
			

			];
			}
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];

			break;

		case 'email':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'default'=>(array_key_exists('default', $data) ? self::$data['default']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

		case 'number':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;
		case 'option':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'data'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('editLock', $data))$array['editLock']=$data['editLock'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

		case 'disable':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;


		case 'radio':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'dataArray'=>(array_key_exists('default', $data) ? self::$data['default']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

		case 'check':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

		case 'password':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;


			case 'textarea':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

			case 'auto':
			if(array_key_exists('hidden', $data)){
				if ($data['hidden']) {
					$data['input']='hidden';
				}
			}
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			//'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

			case 'date':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

			case 'file':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;
		

		default:
			# code...
			break;
	}

	if(isset($value)){
		$array['value']=$value;
		if($array['value']=='array'){
			$array['value']='';
		}
	}

	$lable=preg_split('/(?=[A-Z])/',ucfirst($data['name']));
	unset($lable[0]);
	(count($lable) >= 2 ? $array['lable']=implode(' ', $lable) : null );

	return $array;
}
public static function decode($UniqId){
	$UniqId=str_replace('_','/',$UniqId);
	return $UniqId;
}


public static function enode($UniqId){
	$UniqId=str_replace('/','_',$UniqId);
	return $UniqId;
}

}