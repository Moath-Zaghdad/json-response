<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



# post
Route::get('engineers/all', 'EngineerController@all');
# post
Route::get('engineers/search', 'EngineerController@search');





Route::get('xml', function(Request $request){
	// http://laravel-tricks.com/tricks/responsexml-macro

	// return response()->json(["HI" => 5]);

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><response/>');
	 return  response($xml->asXML(), 200)
            ->header('Content-Type', 'text/xml');
});



/*
#################################
#########	Engineer 	#########
#################################
Route::middleware('engineer')->group(function()
{

	#   Engineer  Routes
	Route::patch('engineers/{engineer}', 'EngineerController@update');
	Route::delete('engineers/{engineer}', 'EngineerController@destroy');

	#   Engineers Images  Routes
	Route::post('engineer-images', 'EngineersImagesController@store');
	Route::delete('engineer-images/{engineerImages}', 'EngineersImagesController@destroy');

});



#   Engineers Images  Routes
Route::get('engineer-images/{engineer}', 'EngineersImagesController@show');

Route::get('engineers/accommodations', 'EngineerController@accommodations');
*/