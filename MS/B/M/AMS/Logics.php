<?php
namespace B\AMS;

class Logics{


	public static function getUserName($UniqId){



		$m=new Model();
		return $m->getHireAgencyCodeFromId($UniqId);
	}


	public static function getAgencyName($UniqId){



		$m=new Model();
		return $m->getHireAgencyCodeFromId($UniqId);
	}



	



	
}