<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBookController;
use App\Http\Controllers\ApiSendEmailController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ApiBookController::class, 'show']);

//create book
Route::post('/create-book-post', [ApiBookController::class, 'store']);

//update book
Route::post('/update/{id}', [ApiBookController::class, 'edit']);

//
Route::delete('/delete/{id}', [ApiBookController::class, 'destroy']);

Route::post('/send-email/{id}', [ApiSendEmailController::class, 'sendEmail']);
