<?php

namespace MS\Core\Helper;


class Router {


	public $outArray=[];

	public $routeSample=[


						[
						'name'=>'.index',
						'route'=>'/',
						'method'=>'index',
						'type'=>'get',
						],


						[
						'name'=>'.indexData',
						'route'=>'/data',
						'method'=>'indexData',
						'type'=>'get',
						],


	];

	public static function make4Mod($module){

		$c=new Router ();

		foreach ($c->routeSample as $value) {
			

			$c->makeRouteArray($module.$value['name'],$value['route'],$value['method'],$value['type']);


		}

		return $c->outArray;

	}


	public function makeRouteArray($Name,$Route,$Method,$Type){

			$this->outArray[]=[
						'name'=>$Name,
						'route'=>$Route,
						'method'=>$Method,
						'type'=>$Type,
						];
	}






}