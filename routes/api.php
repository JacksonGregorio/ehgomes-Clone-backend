<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDash\UserController;
use App\Http\Controllers\ApiCollab\CollabControlermain;
use App\Http\Controllers\ApiPost\PostController;




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//user
Route::get('/database',[UserController::class, 'index'])->middleware('auth:sanctum');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);


//colaborador
Route::post('/collabregister', [CollabControlermain::class, 'register'])->middleware('auth:sanctum');
Route::post('/collab/login', [CollabControlermain::class, 'login']);

//Posts
Route::get('/postDashes',[PostController::class, 'index'])->middleware('auth:sanctum');
Route::post('/postdashes/create',[PostController::class, 'register'])->middleware('auth:sanctum');
