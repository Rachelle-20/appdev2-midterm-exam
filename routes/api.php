<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\ProductAccessMiddleware;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('products', ProductController::class);

Route::post(' products/upload/local',  [ProductController::class,
'uploadImageLocal']);

Route::post(' products/upload/public',  [ProductController::class,
'uploadImagePublic']);



   

// POST route
Route::post('/post', function () {
return response()->json(['message' => 'Storing a new product.']);
})->middleware(ProductAccessMiddleware::class);
// UPDATE route
Route::put('/put', function () {
return response()->json(['message' => 'Updating an existing product.']);
})->middleware(ProductAccessMiddleware::class);
// DELETE route
Route::delete('/delete', function () {
return response()->json(['message' => 'Deleting a product.']);
})->middleware(ProductAccessMiddleware::class);
// UPLOAD route
Route::post('/post', function () {
return response()->json(['message' => 'Uploading images.']);
})->middleware(ProductAccessMiddleware::class);

