<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/task', [TaskController::class, 'showForm']);
Route::post('/task', [TaskController::class, 'handleForm']);
