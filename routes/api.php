<?php

use App\Http\Controllers\Api\DishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function () {
    return response()->json([
        'message' => 'Restaurant API'
    ]);
});

// dish routes
Route::apiResource('dishes', DishController::class)->only('index', 'show');
