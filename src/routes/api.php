<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth.basic')
    ->get('server/run-process', 'Api\v1\Monitoring\ServerStatusController@runProcess');
Route::middleware('auth.basic')
    ->get('user/create-file', 'Api\v1\User\FileManagementController@createUserFile');
Route::middleware('auth.basic')
    ->get('user/create-directory', 'Api\v1\User\FileManagementController@createUserDirectory');
Route::middleware('auth.basic')
    ->get('user/list-files', 'Api\v1\User\FileManagementController@listFiles');
Route::middleware('auth.basic')
    ->get('user/list-directories', 'Api\v1\User\FileManagementController@listDirectories');

Route::post('user/register', 'Auth\RegisterController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
