<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('todo', [TodoController::class, 'getAll']);
Route::post('todo/store', [TodoController::class, 'store']);
Route::get('todo/status/{status}', [TodoController::class, 'getTodobyStatus']);
Route::get('todo/{id}', [TodoController::class, 'getById']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
