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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function (){
    Route::get('dashboard/modules-menu/parameters','api\v1\dashboard\ModulesController@parameters');
    Route::get('dashboard/modules-menu/all','api\v1\dashboard\ModulesController@all');
    Route::post('dashboard/modules-menu/store','api\v1\dashboard\ModulesController@store');
    Route::post('dashboard/modules-menu/update','api\v1\dashboard\ModulesController@update');
    Route::post('dashboard/modules-menu/order-up','api\v1\dashboard\ModulesController@order_up');
    Route::post('dashboard/modules-menu/order-down','api\v1\dashboard\ModulesController@order_down');
    Route::delete('dashboard/modules-menu/delete/{id}','api\v1\dashboard\ModulesController@destroy');
});