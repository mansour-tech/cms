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

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
| Here is all Auth Routes !
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Posts Routes
|--------------------------------------------------------------------------
| Here is all Posts Routes !
*/

require __DIR__.'/post.php';

/*
|--------------------------------------------------------------------------
| Comments Routes
|--------------------------------------------------------------------------
| Here is all Posts Routes !
*/

require __DIR__.'/comment.php';

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
| Here is all Profiles Routes !
*/

require __DIR__.'/profile.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Here is all Admin Routes !
*/

require __DIR__.'/admin.php';


