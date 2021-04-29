<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\
{
    ProfileController,
};

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Profile" middleware group. Now create something great!
|
*/

Route::get('/user/{id}',[ProfileController::class,'getByUser'])->name('getByUser');
Route::get('/user/{id}/comments',[ProfileController::class,'getCommentsByUser'])->name('getCommentsByUser');;
Route::get('/settings',[ProfileController::class,'settings'])->name('settings');;
Route::post('/settings',[ProfileController::class,'updateProfile'])->name('settings');;