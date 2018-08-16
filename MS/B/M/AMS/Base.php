<?php
namespace B\AMS;


use \Illuminate\Http\Request;





class Base{


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $controller="\B\AMS\Controller";
public static $model="\B\M\AMS\Model";


public static $routes=[
						[
						'name'=>'AMS.index',
						'route'=>'/',
						'method'=>'index',
						'type'=>'get',
						],

						[
						'name'=>'AMS.index.Data',
						'route'=>'/data',
						'method'=>'indexData',
						'type'=>'get',
						],



						[
						'name'=>'AMS.Agency.Add',
						'route'=>'/agency/add',
						'method'=>'agencyAdd',
						'type'=>'get',
						],


						[
						'name'=>'AMS.Agency.Add.Post',
						'route'=>'/agency/add',
						'method'=>'agencyAddPost',
						'type'=>'post',
						],



						[
						'name'=>'AMS.Agency.View',
						'route'=>'/agency/view',
						'method'=>'agencyView',
						'type'=>'get',
						],


						[
						'name'=>'AMS.Agency.View.Id',
						'route'=>'/agency/view/{UniqId}',
						'method'=>'agencyViewbyId',
						'type'=>'get',
						],

						[
						'name'=>'AMS.Agency.Edit.Id',
						'route'=>'/agency/edit/{UniqId}',
						'method'=>'agencyEditbyId',
						'type'=>'get',
						],


						[
						'name'=>'AMS.Agency.Edit.Id.Post',
						'route'=>'/agency/edit',
						'method'=>'agencyEditbyIdPost',
						'type'=>'post',
						],

						[
						'name'=>'AMS.Agency.Delete.Id',
						'route'=>'/agency/delete/{UniqId}',
						'method'=>'agencyDeletebyId',
						'type'=>'get',
						],


						[
						'name'=>'AMS.Portal.Login',
						'route'=>'/hook/AgencyLogin',
						'method'=>'hookAgencyLoginPost',
						'type'=>'post',
						],
					];

public static $tableNo="0";



//public static $connection ="MSDBC";

public static $allOnSameconnection=true;



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table="AMS_Agency_Master";

public static $connection ="AMS_Master";

public static $tableStatus=false;

public static $field=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],


//basic details 

['name'=>'Name','type'=>'string','input'=>'text',  ],
['name'=>'AddressLine1','vName'=>'Address Line 1','type'=>'string','input'=>'text',  ],
['name'=>'AddressLine2','vName'=>'Address Line 2','type'=>'string','input'=>'text',  ],
['name'=>'AddressLine3','vName'=>'Address Line 3','type'=>'string','input'=>'text',  ],
['name'=>'Landmark','vName'=>'Landmark','type'=>'string','input'=>'text',  ],
['name'=>'City','vName'=>'City','type'=>'string','input'=>'text',  ],
['name'=>'State','vName'=>'State','type'=>'string','input'=>'text',  ],
['name'=>'Pincode','vName'=>'Pincode','type'=>'string','input'=>'text',  ],

// Contact Person


['name'=>'AttName','vName'=>'Name','type'=>'string','input'=>'text',  ],
['name'=>'AttConatctNo','vName'=>'Contact No.','type'=>'string','input'=>'number',  ],
['name'=>'AttEmail','vName'=>'Email','type'=>'string','input'=>'email',  ],



//Login Credetial
	
 ['name'=>'Username','type'=>'string','input'=>'text',  ],
 ['name'=>'Password','type'=>'string','input'=>'password',  ],

//Working details

 ['name'=>'AllocatedJobs','type'=>'string','input'=>'text',  ],
 





['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////


public static $table1="AMS_Agency_Master";

public static $connection1 ="AMS_Master";

public static $tableStatus1=false;

public static $field1=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],


//basic details 

['name'=>'Name','type'=>'string','input'=>'text',  ],
['name'=>'AddressLine1','vName'=>'Address Line 1','type'=>'string','input'=>'text',  ],
['name'=>'AddressLine2','vName'=>'Address Line 2','type'=>'string','input'=>'text',  ],
['name'=>'AddressLine3','vName'=>'Address Line 3','type'=>'string','input'=>'text',  ],
['name'=>'Landmark','vName'=>'Landmark','type'=>'string','input'=>'text',  ],
['name'=>'City','vName'=>'City','type'=>'string','input'=>'text',  ],
['name'=>'State','vName'=>'State','type'=>'string','input'=>'text',  ],
['name'=>'Pincode','vName'=>'Pincode','type'=>'string','input'=>'number',  ],


//Login Credetial
	
 // ['name'=>'Username','type'=>'string','input'=>'text',  ],
 // ['name'=>'Password','type'=>'string','input'=>'password',  ],
 //  ['name'=>'Email','type'=>'string','input'=>'enail',  ],
 //  ['name'=>'ConfirmPassword','type'=>'string','input'=>'password',  ],

//Working details

 // ['name'=>'AllocatedJobs','type'=>'string','input'=>'text',  ],
 





['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];




////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////

public static $table2="AMS_Agency_Master_Att";

public static $connection2 ="AMS_Master";

public static $tableStatus2=false;

public static $field2=[
 

['name'=>'AttName','vName'=>'Name','type'=>'string','input'=>'text',  ],
['name'=>'AttConatctNo','vName'=>'Contact No.','type'=>'string','input'=>'number',  ],
['name'=>'AttEmail','vName'=>'Email','type'=>'string','input'=>'email',  ],

];


////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////

public static $table3="AMS_Agency_Master_Credetial";

public static $connection3 ="AMS_Master";

public static $tableStatus3=false;

public static $field3=[
 

 ['name'=>'Username','type'=>'string','input'=>'text',  ],
 ['name'=>'Password','type'=>'string','input'=>'password',  ],
  ['name'=>'Email','type'=>'string','input'=>'enail',  ],
  ['name'=>'ConfirmPassword','type'=>'string','input'=>'password',  ],

];


////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table4="AMS_Agency_Master";

public static $connection4 ="AMS_Master";

public static $tableStatus4=false;

public static $field4=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','default'=>'genUniqID',],


//basic details 

['name'=>'Name','type'=>'string','input'=>'text',  ],
['name'=>'AddressLine1','vName'=>'Address Line 1','type'=>'string','input'=>'text',  ],
['name'=>'AddressLine2','vName'=>'Address Line 2','type'=>'string','input'=>'text',  ],
['name'=>'AddressLine3','vName'=>'Address Line 3','type'=>'string','input'=>'text',  ],
['name'=>'Landmark','vName'=>'Landmark','type'=>'string','input'=>'text',  ],
['name'=>'City','vName'=>'City','type'=>'string','input'=>'text',  ],
['name'=>'State','vName'=>'State','type'=>'string','input'=>'text',  ],
['name'=>'Pincode','vName'=>'Pincode','type'=>'string','input'=>'text',  ],

// Contact Person


['name'=>'AttName','vName'=>'Name','type'=>'string','input'=>'text',  ],
['name'=>'AttConatctNo','vName'=>'Contact No.','type'=>'string','input'=>'number',  ],
['name'=>'AttEmail','vName'=>'Email','type'=>'string','input'=>'email',  ],



//Login Credetial
	
 ['name'=>'Username','type'=>'string','input'=>'text',  ],
 ['name'=>'Password','type'=>'string','input'=>'password',  ],

//Working details






['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

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
	'Deactive','Active'
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


								return [

									'id'=>$id,
									'tableName'=>$table,
									'connection'=>$connection,
								];
								
							}


			

				}						


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
			break;

		case 'number':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
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
			break;

		case 'disable':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			break;


		case 'radio':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'data'=>(array_key_exists('default', $data) ? self::$data['default']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			break;

		case 'check':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			break;

		case 'password':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			break;


			case 'textarea':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
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
			break;

			case 'date':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			break;

			case 'file':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
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