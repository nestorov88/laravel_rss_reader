<?php

use App\Http\Controllers\RssFeedItemsController;
use App\Http\Controllers\RssFeedController;
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

Route::get('/', function () {
    return view('home');
});


Route::controller(RssFeedItemsController::class)->group(function () {

    Route::get('/feed', 'index')->name('feed.index');

});



Route::resource('url', RssFeedController::class, [
    'only' => ['index', 'create', 'store', ]
]);

Route::controller(RssFeedController::class)->group(function () {

    Route::get('url/{id}/delete', 'delete')->name('url.delete');

});

