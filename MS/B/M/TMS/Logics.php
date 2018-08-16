<?php
namespace B\TMS;

class Logics{
	



	public static function getHireAgencyCode($code){


		

		$model=new \B\AMS\Model (0);

		//dd($model->getHireAgencyCodeFromId($code));

		return $model->getHireAgencyCodeFromId($code);


	}


	public static function getTypeOfAction($code){


		$model=new \B\TMS\Model (0);
		\MS\Core\Helper\Comman::DB_flush();


		//dd($model->getTypeOfActionFromId($code));



		return $model->getTypeOfActionFromId($code);
	}
}