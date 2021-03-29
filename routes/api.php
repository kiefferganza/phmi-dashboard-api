<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\InventoryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);


//Authenticated Routes
Route::middleware('auth:sanctum')->group( function () {
    Route::get('/logs/index', 'ItemLogsController@index')->name('itemlogs.index');
    Route::get('/cutoff/index', 'InventoryCutoffController@index')->name('invcutoff.index');
    Route::get('/cutoff/items', 'InventoryCutoffController@inventoryItems')->name('invcutoff.items');
    Route::post('/cutoff/store', 'InventoryCutoffController@store')->name('invcutoff.store');
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::post('/logout', [AuthController::class, 'logout']);
});

