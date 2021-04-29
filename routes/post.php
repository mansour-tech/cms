<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\
{
    PostController,
};

/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Post" middleware group. Now create something great!
|
*/

Route::get('/',[PostController::class,'index']); //->middleware('verified');
Route::resource('/post',PostController::class)->except('index');
Route::get('{id}/{slug}',[PostController::class,'getByCategory'])->name('category')->where('id','[0-9]+');