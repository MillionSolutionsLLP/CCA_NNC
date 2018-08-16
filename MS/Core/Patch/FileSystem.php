<?php
namespace MS\Core\Patch;


class DB {


public $m="_Master";
public $d="_Data";
public $basePath='MS'.DIRECTORY_SEPARATOR.'DB'.DIRECTORY_SEPARATOR.'Master'.DIRECTORY_SEPARATOR;
public $loadArray=[];


public $modules=[

'MAS',
'NM',
'TM',
'DM'

];







public static function load(){

  $class=new DB ();

  foreach ($class->modules as $value) {
    
  $class->loadUnit($value);    

  }



  return $class->loadArray;
	

}


public  function loadUnit($module){

	$return[$module.$this->m]=[
								'driver' => 'sqlite',
  						        'database' => base_path($this->basePath.$module.$this->m),
   								'prefix' => '',
							];

	$return[$module.$this->d]=[
								'driver' => 'sqlite',
  						        'database' => base_path($this->basePath.$module.$this->d),
   								'prefix' => '',
							];
  $this->loadArray=array_merge($this->loadArray,$return);


}










	  // 'IM_Master' => [
   //          'driver' => 'sqlite',
   //          'database' => base_path('MS'.DIRECTORY_SEPARATOR.'DB'.DIRECTORY_SEPARATOR.'Master'.DIRECTORY_SEPARATOR.'IM_Master'),
   //          'prefix' => '',
   //      ],


   //      'IM_Data' => [
   //          'driver' => 'sqlite',
   //          'database' => base_path('MS'.DIRECTORY_SEPARATOR.'DB'.DIRECTORY_SEPARATOR.'Master'.DIRECTORY_SEPARATOR.'IM_Data'),
   //          'prefix' => '',
   //      ],

}