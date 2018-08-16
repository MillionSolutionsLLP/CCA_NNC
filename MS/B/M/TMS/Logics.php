<?php
namespace B\TMS;

class Logics{
	



	public static function getHireAgencyCode($code){


		

		$model=new \B\AMS\Model (0);

		//dd($model->getHireAgencyCodeFromId($code));

		return $model->getHireAgencyCodeFromId($code);


	}
}