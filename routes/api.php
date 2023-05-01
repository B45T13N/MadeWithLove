<?php

use App\Http\Controllers\Api\Basket\BasketController;
use App\Http\Controllers\Api\Item\ItemController;
use App\Http\Resources\Item\ItemResourceCollection;
use App\Models\Item;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/items', [ItemController::class, 'index']);

Route::get('/hotDeals', [ItemController::class, 'getHotDeals']);

Route::get('/item/{id}', [ItemController::class, 'getItemById']);

Route::get('/basket/{userId}', [BasketController::class, 'getCurrentUserBasket']);

Route::post('/basket/addItem', [BasketController::class, 'addItemToBasket']);

Route::delete('/basket/deleteItem/{addableId}', [BasketController::class, 'deleteItemFromBasket']);
