<?php
namespace B\ATMS;

class Logics{


	public static function getTypeOfDocument($UniqId){



		return Base::getTypeOfDocumentById($UniqId);


	}
	
}