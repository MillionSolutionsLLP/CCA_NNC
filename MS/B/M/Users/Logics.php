<?php 
namespace B\Users;

class Logics{


	public static function getUserName ($code){


		$m=new Model();
		return $m->getUserNameById($code);
	}



	public static function getUserCode ($code){


		$m=new Model();
		return $m->getUserCodeById($code);
	}


}

