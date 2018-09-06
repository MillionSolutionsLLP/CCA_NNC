<?php
namespace B\NMS;

class Logics{




	public static function newNotification($userId,$admin=1,$typeOfNotification,$text=null,$link=null){

		\MS\Core\Helper\Comman::DB_flush();




		$addArray=[


		'UniqId'=>\MS\Core\Helper\Comman::random(2),
		'TextOfNotification'=>self::getTypeofDocument($typeOfNotification).$text,
		'TypeOfNotification'=>$typeOfNotification,
		'Read'=>0,
		'NotificationLink'=>$link,

		];




		// $m=new Model(3,$userId);
		// $m=$m->MS_add($addArray);


		$m2=new \B\Users\Model();

		//dd($m2->MS_all());

		foreach ($m2->MS_all()as $key => $value) {

			\MS\Core\Helper\Comman::DB_flush();
			$m=new Model(3,$value['UniqId']);
			$m=$m->MS_add($addArray);
		
		}
		//dd($addArray);





	}
		

	public static function getTypeofDocument($code){

		\MS\Core\Helper\Comman::DB_flush();
		$m=new Model(1);

		return $m->getTypeofDocumentById($code);
	}


}