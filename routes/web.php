<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//    return view('main');
//});

//    // Login
//    Route::get('login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('show_login');
//    Route::post('login', [App\Http\Controllers\Auth\LoginController::class,'login']);
//    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
//

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('upload', [App\Http\Controllers\HomeController::class,'upload'])->name('upload');

Auth::routes();

Route::group(['middleware' =>'auth'], function() {

    Route::get('/test', function () {
        return view('test');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/',  [App\Http\Controllers\OrdersController::class, 'index']);
        Route::get('data',  [App\Http\Controllers\OrdersController::class, 'data']);
        Route::get('create',  [App\Http\Controllers\OrdersController::class, 'create']);
        Route::post('/',  [App\Http\Controllers\OrdersController::class, 'store']);
        Route::post('/changeStatus',  [App\Http\Controllers\OrdersController::class, 'changeStatus']);
        Route::get('{item}/edit',  [App\Http\Controllers\OrdersController::class, 'edit']);
        Route::get('{item}/show',  [App\Http\Controllers\OrdersController::class, 'show']);
        Route::put('{item}',  [App\Http\Controllers\OrdersController::class, 'update']);
        Route::delete('{item}',  [App\Http\Controllers\OrdersController::class, 'destroy']);
    });

    //OFFERS

    Route::group(['prefix' => 'offers'], function () {
        Route::get('/',  [App\Http\Controllers\OffersController::class, 'index']);
        Route::get('data',  [App\Http\Controllers\OffersController::class, 'data']);
        Route::get('create',  [App\Http\Controllers\OffersController::class, 'create']);
        Route::post('/',  [App\Http\Controllers\OffersController::class, 'store']);
        Route::post('/changeStatus',  [App\Http\Controllers\OffersController::class, 'changeStatus']);
        Route::get('{item}/edit',  [App\Http\Controllers\OffersController::class, 'edit']);
        Route::get('{item}/show',  [App\Http\Controllers\OffersController::class, 'show']);
        Route::put('{item}',  [App\Http\Controllers\OffersController::class, 'update']);
        Route::delete('{item}',  [App\Http\Controllers\OffersController::class, 'destroy']);
    });

    //MAP
    Route::group(['prefix' => 'map'], function () {
        Route::get('/',  [App\Http\Controllers\MapController::class, 'index']);
    });


//POSTERS
    Route::group(['prefix' => 'posters'], function () {
        Route::get('/',  [App\Http\Controllers\PostersController::class, 'index']);
        Route::get('data',  [App\Http\Controllers\PostersController::class, 'data']);
        Route::get('create',  [App\Http\Controllers\PostersController::class, 'create']);
        Route::post('/',  [App\Http\Controllers\PostersController::class, 'store']);
        Route::get('{item}/edit',  [App\Http\Controllers\PostersController::class, 'edit']);
        Route::get('{item}/show',  [App\Http\Controllers\PostersController::class, 'show']);
        Route::put('{item}',  [App\Http\Controllers\PostersController::class, 'update']);
        Route::delete('{item}',  [App\Http\Controllers\PostersController::class, 'destroy']);
    });
//CLIENTS
    Route::group(['prefix' => 'clients'], function () {
        Route::get('/',  [App\Http\Controllers\ClientsController::class, 'index']);
        Route::get('data',  [App\Http\Controllers\ClientsController::class, 'data']);
        Route::get('create',  [App\Http\Controllers\ClientsController::class, 'create']);
        Route::post('/',  [App\Http\Controllers\ClientsController::class, 'store']);
        Route::get('{item}/edit',  [App\Http\Controllers\ClientsController::class, 'edit']);
        Route::get('{item}/show',  [App\Http\Controllers\ClientsController::class, 'show']);
        Route::get('/orders/{client_id}',  [App\Http\Controllers\ClientsController::class, 'orders']);
        Route::get('/offers/{client_id}',  [App\Http\Controllers\ClientsController::class, 'offers']);
        Route::put('{item}',  [App\Http\Controllers\ClientsController::class, 'update']);
        Route::delete('{item}',  [App\Http\Controllers\ClientsController::class, 'destroy']);
    });

    //USERS
    Route::group(['prefix' => 'users'], function () {
        Route::get('/',  [App\Http\Controllers\UsersController::class, 'index']);
        Route::get('data',  [App\Http\Controllers\UsersController::class, 'data']);
        Route::get('create',  [App\Http\Controllers\UsersController::class, 'create']);
        Route::post('/',  [App\Http\Controllers\UsersController::class, 'store']);
        Route::get('{item}/edit',  [App\Http\Controllers\UsersController::class, 'edit']);
        Route::get('{item}/show',  [App\Http\Controllers\UsersController::class, 'show']);
        Route::put('{item}',  [App\Http\Controllers\UsersController::class, 'update']);
        Route::delete('{item}',  [App\Http\Controllers\UsersController::class, 'destroy']);
    });

    //MEDIATORS
    Route::group(['prefix' => 'mediators'], function () {
        Route::get('/',  [App\Http\Controllers\MediatorsController::class, 'index']);
        Route::get('data',  [App\Http\Controllers\MediatorsController::class, 'data']);
        Route::get('create',  [App\Http\Controllers\MediatorsController::class, 'create']);
        Route::post('/',  [App\Http\Controllers\MediatorsController::class, 'store']);
        Route::get('{item}/edit',  [App\Http\Controllers\MediatorsController::class, 'edit']);
        Route::get('{item}/show',  [App\Http\Controllers\MediatorsController::class, 'show']);
        Route::put('{item}',  [App\Http\Controllers\MediatorsController::class, 'update']);
        Route::delete('{item}',  [App\Http\Controllers\MediatorsController::class, 'destroy']);
    });

    //NOTES
    Route::group(['prefix' => 'notes'], function () {
        Route::get('/',  [App\Http\Controllers\SystemNoteController::class, 'index']);
        Route::get('data',  [App\Http\Controllers\SystemNoteController::class, 'data']);
        Route::get('create',  [App\Http\Controllers\SystemNoteController::class, 'create']);
        Route::post('/',  [App\Http\Controllers\SystemNoteController::class, 'store']);
        Route::get('{item}/edit',  [App\Http\Controllers\SystemNoteController::class, 'edit']);
        Route::get('{item}/show',  [App\Http\Controllers\SystemNoteController::class, 'show']);
        Route::put('{item}',  [App\Http\Controllers\SystemNoteController::class, 'update']);
        Route::delete('{item}',  [App\Http\Controllers\SystemNoteController::class, 'destroy']);
    });
});



