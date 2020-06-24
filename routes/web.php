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

Route::get('/', function () {
    return view('home');
});

Route::post('/home/submit', 'ContactController@submit');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', 'ContactController@allData');
    Route::get('/{id}', 'ContactController@showDetailMessage')->name('message-detail');
    Route::get('/{id}/update', 'ContactController@updateMessage');
    Route::post('/{id}/update/submit', 'ContactController@updateMessageSubmit')->name('message-update-submit');
    Route::post('/{id}/delete', 'ContactController@deleteMessage');
});

Auth::routes(['register' => false]);
