<?php

use App\Http\Controllers\API\TodoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return res('API Server running!');
});

Route::prefix('todo')->group(function () {
    Route::get('list', [TodoController::class, 'list']);
    Route::get('details/{todo}', [TodoController::class, 'details']);
    Route::post('add', [TodoController::class, 'add']);
    Route::post('update/{todo}', [TodoController::class, 'update']);
    Route::delete('delete/{todo}', [TodoController::class, 'delete']);
    Route::post('toggle-status/{todo}', [TodoController::class, 'toggleStatus']);
});
