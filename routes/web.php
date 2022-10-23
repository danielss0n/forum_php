<?php

use Illuminate\Support\Facades\Route;
use App\Models\Board;

//IMPORT CONTROLLERS
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

//HOME
Route::get('/', [PostController::class, 'home']);

//ROTAS THREAD
Route::get('/boards/{name}', [PostController::class, 'showBoardThreads']);
Route::post('/boards/{board_name}', [PostController::class, 'storeThread']);
Route::get('/thread/{thread_id}', [PostController::class, 'showThread']);
Route::post('/thread/{comment_id}', [PostController::class, 'createComment']);

//ROTAS ADMIN
Route::get('/admin', [AdminController::class, 'adminPage']);
Route::get('/admin', [AdminController::class, 'adminPage']);
Route::post('/addBoard', [AdminController::class, 'addBoard']);
Route::post('/removeBoard/{board_name}', [AdminController::class, 'removeBoard']);
Route::post('/removeThread/{id}', [AdminController::class, 'removeThread']);





