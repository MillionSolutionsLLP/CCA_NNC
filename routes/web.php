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

dd(\MS\Core\Helper\Comman::en('nidhi123'));	
});


Route::prefix('admin')->group(function () {
	
Route::get('/', function () {
return redirect()->action('\B\Panel\Controller@index');	
});
  MS\Core\Helper\Comman::loadBack();

});

Route::prefix('ATMS')->group(function () {


	Route::prefix('Data')->group(function () {


			Route::middleware(['backend'])

			->group(function () {
		Route::get('{UniqId}/{TaskId}/{StepId}/{FileName}',function($UniqId,$TaskId,$StepId,$FileName){




			//dd(implode('/',['ATMS','Data',$TaskId,$StepId,$FileName]));

			$img=\Storage::disk('ATMS')->get(implode('/',['Data',$TaskId,$StepId,$FileName]));
			
		//	dd();

			 return (new \Illuminate\Http\Response($img))->header('Content-Type', \Storage::disk('ATMS')->mimeType(implode('/',['Data',$TaskId,$StepId,$FileName])));



			});

		});


	});



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
