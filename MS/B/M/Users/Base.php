<?php
namespace B\Users;


use \Illuminate\Http\Request;





class Base
{


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $controller="\B\Users\Controller";
public static $model="\B\M\Users\Model";

public static $field=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','data'=>['input-size'=>'col-lg-2']],

['name'=>'FirstName','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-5']],
['name'=>'LastName','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-5']],
['name'=>'UserName','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-3']],
['name'=>'Password','type'=>'string','input'=>'password','data'=>['input-size'=>'col-lg-4']],
//['name'=>'ConfirmPassword','type'=>'string','input'=>'password','data'=>['input-size'=>'col-lg-5']],
['name'=>'MobileNumber','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-4']],
['name'=>'Email','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-4']],
['name'=>'OTP','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-1']],
['name'=>'RoleCode','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-2']],

['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status','data'=>['input-size'=>'col-lg-4']],

];
public static $routes=[
						[
						'name'=>'Users.Data',
						'route'=>'/',
						'method'=>'index',
						'type'=>'get',
						],

						[
						'name'=>'Users.Login.Form',
						'route'=>'/login',
						'method'=>'login_form',
						'type'=>'get',
						],


					
						

						[
						'name'=>'Users.Login.Form',
						'route'=>'/login/otp',
						'method'=>'login_form_otp',
						'type'=>'get',
						],


						[
						'name'=>'Users.Login.Form',
						'route'=>'/login/otp/post',
						'method'=>'login_otp_post',
						'type'=>'post',
						],

						[
						'name'=>'Users.Login.Form',
						'route'=>'/login/post',
						'method'=>'login_post',
						'type'=>'post',
						],

						[
						'name'=>'Users.Add.Form',
						'route'=>'/add',
						'method'=>'add_form',
						'type'=>'get',
						],
						[
						'name'=>'Users.Add.Post',
						'route'=>'/add/post',
						'method'=>'add_form_post',
						'type'=>'post',
						],
						[
						'name'=>'Users.Add.Post',
						'route'=>'/logout',
						'method'=>'logout',
						'type'=>'get',
						],



						

						
						[
						'name'=>'Users.Edit.Id.Modal',
						'route'=>'/edit/user/model/{UniqId}',
						'method'=>'editUserForModal',
						'type'=>'get',
						],
						[
						'name'=>'Users.Edit.Id',
						'route'=>'/edit/user/{UniqId}',
						'method'=>'editUser',
						'type'=>'get',
						],


[
						'name'=>'Users.Edit.Id.Mod',
						'route'=>'/edit/user/mod/{UniqId}',
						'method'=>'editUserMod',
						'type'=>'get',
						],

							[
						'name'=>'Users.Add.Form',
						'route'=>'/edit/user',
						'method'=>'editUserPost',
						'type'=>'post',
						],


						[
						'name'=>'Users.View',
						'route'=>'/view/user',
						'method'=>'view_all_users',
						'type'=>'get',
						],


						
					];





public static $table="Users";

public static $connection ="MSDBC";



public static $field1=[
['name'=>'UniqId','type'=>'string','input'=>'auto','callback'=>'genUniqID','data'=>['input-size'=>'col-lg-2']],

['name'=>'FirstName','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-5']],
['name'=>'LastName','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-5']],
['name'=>'UserName','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-3']],
['name'=>'Password','type'=>'string','input'=>'password','data'=>['input-size'=>'col-lg-4']],
['name'=>'ConfirmPassword','type'=>'string','input'=>'password','data'=>['input-size'=>'col-lg-5']],
['name'=>'MobileNumber','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-3']],
['name'=>'Email','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-5']],
//['name'=>'OTP','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-1']],
//['name'=>'RoleCode','type'=>'string','input'=>'text','data'=>['input-size'=>'col-lg-2']],
['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status','data'=>['input-size'=>'col-lg-4']],

];




////////////////////////////////////
/////////////////////////////////////
//MODEL CALLBACK FUNCTIONS///////////
///////////////////////////////////
/////////////////////////////////




public static function status(){
	return [
	1=>'Active',0=>'Deactive'
	];
}

// public static function genUniqID(){
// 	//if($this->where(''))
// 	return \MS\Core\Helper\Comman::getYr()."_".\MS\Core\Helper\Comman::getDay()."_".\MS\Core\Helper\Comman::getMon()."_".str_random(4);
// }


//////////////////////////////
//////////////////////////////
//DO NOT EDIT BELOW///////////
////////////////////////////
//////////////////////////



public static  function genFormData($edit=false,$data=[],$id=false){
	
	$array=[];
	if($edit and count($data)>0){

		$model=new Model($id);
			
	


		$v=$model->where(array_keys($data)[0],$data[array_keys($data)[0]])->first();

		if($v!=null){
			$v=$v->toArray();
		}else{
			$v=$data;
		}
		

		if($id){
		
				$field="field".$id;
				foreach (self::$$field as $value) {
				//dd($v);
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
			
			
		//	dd($array);

			
			}
			if(array_key_exists('vName', $data))$array['vName']=$data['vName'];
			if(array_key_exists('editLock', $data))$array['editLock']=$data['editLock'];
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
			'dataArray'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];

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
			break;


		case 'radio':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			'dataArray'=>(array_key_exists('default', $data) ? self::$data['default']() : null),
			];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

		case 'check':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

		case 'password':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;


			case 'textarea':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
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
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;
			case 'date':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
			if(array_key_exists('data', $data))$array['data']=$data['data'];
			break;

			case 'file':
			$array=[
			'lable'=>ucfirst($data['name']),
			'name'=>$data['name'],
			'type'=>$data['input'],
			'value'=>(array_key_exists('callback', $data) ? self::$data['callback']() : null),
			];
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



