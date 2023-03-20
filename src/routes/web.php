<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\RecruitController;

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
Route::get('user/profile/{id}', [ProfileController::class, 'add'])
    ->name('user.profile');
Route::post('user/profile/{id}', [ProfileController::class, 'create']);

//プロフィール編集画面
Route::get('user/edit/{id}', [ProfileController::class, 'edit'])
    ->name('edit');
Route::post('user/update/{id}', [ProfileController::class, 'update'])
    ->name('update');
//募集画面一覧
Route::get('/recruit', [RecruitController::class, 'index'])
    ->name('recruit.index');

//募集新規作成画面
Route::get('/recruit/create', [RecruitController::class, 'create'])
    ->name('recruit.create');
//募集確認画面
Route::post('/recruit', [RecruitController::class, 'store'])
    ->name('recruit.store');
//募集編集画面

// 募集編集画面
Route::get('/recruit/{recruit}/edit', [RecruitController::class, 'edit'])
    ->name('recruit.edit');
// 募集更新
Route::put('/recruit/{recruit}', [RecruitController::class, 'update'])
    ->name('recruit.update');
// 募集削除
Route::delete('/recruit/{recruit}', [RecruitController::class, 'destroy'])
    ->name('recruit.destroy');
// 募集詳細機能
Route::get('/recruit/{recruit}', [RecruitController::class, 'show'])
    ->name('recruit.show');

// 応募機能
Route::post('/recruit/{recruit}/apply', [RecruitController::class, 'apply'])
    ->name('recruit.apply')->middleware('auth');

//応募者一覧機能
Route::get('/recruit/{recruit}/applicants', [RecruitController::class, 'applicants'])
    ->name('recruit.applicants')->middleware('auth');

//マッチング機能
Route::post('/recruit/{recruit}/applicants/{applicant}/match', [RecruitController::class, 'match'])
    ->name('recruit.match')->middleware('auth');

//my募集一覧
// Route::get('/recruit/my-recruits', [RecruitController::class, 'myRecruits'])
//     ->middleware(['auth'])->name('recruit.my-recruits');

// my募集一覧
Route::get('/my-recruits', [RecruitController::class, 'myRecruits'])
    ->middleware(['auth'])->name('recruit.my-recruits');
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