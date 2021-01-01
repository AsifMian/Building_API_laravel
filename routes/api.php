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

Route::get('polls',"PollsController@index");
Route::get('polls/{id}',"PollsController@show");
Route::post('poll',"PollsController@store"); //store a new poll
Route::put('poll/{poll}',"PollsController@update"); //update a new poll
Route::Delete('poll/{poll}',"PollsController@delete"); //update a new poll

// questions resource controller
Route::apiResource('questions','QuestionsController');

//getting all the question in a poll
Route::get('polls/{poll}/questions','PollsController@questions');

//route for downloadig a file using our api example
Route::get('files/download','FilesController@show');
// upload a file
Route::Post('files/create','FilesController@create');

