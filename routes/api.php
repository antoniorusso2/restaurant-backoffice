<?php

use App\Http\Controllers\Api\DishController;
use App\Http\Middleware\JsonResponse;
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
Route::prefix('api.')->name('api')->middleware([JsonResponse::class])->apiResource('dishes', DishController::class)->only('index', 'show')->missing(function () {
    return response()->json([
        'success' => false,
        'message' => 'Dish not found'
    ], 404);
});

Route::fallback(
    function () {
        return response()->json([
            'success' => false,
            'message' => 'URL not found'
        ], 404);
    }
);
