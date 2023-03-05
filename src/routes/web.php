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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/email', 'App\Http\Controllers\ChangeEmailController@sendChangeEmailLink');

require __DIR__ . '/auth.php';

// 新規メールアドレスに更新
Route::get("reset/{token}", "App\Http\Controllers\ChangeEmailController@reset");
