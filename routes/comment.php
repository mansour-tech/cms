<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\
{
    CommentController,
};

/*
|--------------------------------------------------------------------------
| Comment Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Comment" middleware group. Now create something great!
|
*/

Route::resource('/comment',CommentController::class);
