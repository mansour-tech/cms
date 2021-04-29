<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\
{
    DashController,
    PermissionController,
    RoleController,
    PageController,
    CategoryController,
    UserController,
};

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin',  'middleware' => 'Admin'], function () { 
    Route::get('/dashboard', [DashController::class , 'index'])->name('dashboard');
    Route::resource('/posts', 'App\Http\Controllers\admin\PostController')->middleware('Admin')->middleware('Admin');
    Route::get('/permission', [PermissionController::class  , 'index'])->middleware('Admin')->name('permissions');
    Route::post('/permission', [RoleController::class , 'store'])->middleware('Admin')->name('permissions');
    Route::resource('/page', PageController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/user', UserController::class);
    
});
Route::post('permission/byRole',[RoleController::class , 'getByRole'])->middleware('Admin')->name('permission_byRole');