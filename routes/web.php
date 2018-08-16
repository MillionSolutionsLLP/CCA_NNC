<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', function () {

	
});


Route::prefix('admin')->group(function () {
	
Route::get('/', function () {
return redirect()->action('\B\Panel\Controller@index');	
});
  MS\Core\Helper\Comman::loadBack();

});




Route::prefix('agency')->group(function () {
	


	Route::get('/', function () {
	return redirect()->action('\B\APanel\Controller@index');	
	});

	$arrayForRoute=[

		'locationOfFile'=>'B.M.AgencyRoute',


	];
	MS\Core\Helper\Comman::loadCustom($arrayForRoute);



  MS\Core\Helper\Comman::loadBack();

});






Route::get('/', function () {
return redirect()->action('\B\APanel\Controller@index');	
});

  //MS\Core\Helper\Comman::loadFront();
