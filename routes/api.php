<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDash\UserController;
use App\Http\Controllers\ApiCollab\CollabControlermain;
use App\Http\Controllers\ApiPost\PostController;




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/database',[UserController::class, 'index']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

//colaborador
Route::post('/collabregister', [CollabControlermain::class, 'register']);
Route::post('/collab/login', [CollabControlermain::class, 'login']);

//
Route::get('/postDashes',[PostController::class, 'index']);
Route::get('/postDashes/Create',[PostController::class, 'register']);
