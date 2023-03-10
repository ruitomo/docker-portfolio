<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangeEmailController;

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

Route::post('/email', [ChangeEmailController::class, 'sendChangeEmailLink']);
require __DIR__ . '/auth.php';

// 新規メールアドレス更新
Route::get("reset/{token}", [ChangeEmailController::class, 'reset']);

//プロフィール画面
Route::get('user/profile/{id}', [ProfileController::class, 'add']);
Route::post('user/profile/{id}', [ProfileController::class, 'create']);

//プロフィール編集画面
Route::get('user/edit/{id}', [ProfileController::class, 'edit'])
    ->name('edit');
Route::post('user/update/{id}', [ProfileController::class, 'update'])
    ->name('update');


// プロフィール画面
// Route::get('/profile/{id}', [ProfileController::class, 'edit'])
//     ->name('profile.edit')
//     ->middleware('auth');


// Route::get('/profile/edit', [ProfileController::class, 'edit'])
//     ->name('profile.edit')
//     ->middleware('auth');

// Route::post('/profile/update', [ProfileController::class, 'update'])
//     ->name('profile.update')
//     ->middleware('auth');