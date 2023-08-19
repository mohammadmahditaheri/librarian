<?php

/*
|--------------------------------------------------------------------------
| Service - API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Prefix: /api/books
use App\Services\Books\Http\Controllers\GetBookController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/'], function () {

    /**
     * books
     */
    Route::prefix('/books')->group(function () {
        Route::get('/', function () {
            return response()->json(['path' => 'GET /api/books']);
        });
        Route::get('/{bookId}', [GetBookController::class, 'show']);
    });


});
