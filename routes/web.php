<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\FrontEnd\IndexController;


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




Route::group(['prefix'=>'admin','middleware'=>'admin:admin'],function(){
    Route::get('/login', [AdminController::class,'loginForm']);
    Route::post('/login', [AdminController::class,'store'])->name('admin.login');
});
/*
|--------------------------------------------------------------------------
| Admin Dashbord routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin Dashbord routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::get('/logout', [AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('admin/profile/edit',[AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile_edit');
Route::get('admin/profile/store',[AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
Route::get('admin/change/password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.change_password');
Route::post('admin/change/updatePassword',[AdminProfileController::class, 'adminChangeUddatePassword'])->name('admin.store.change_password');



/*
|--------------------------------------------------------------------------
| USER routes
|--------------------------------------------------------------------------
|
| Here is where you can register USER routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class,'index']);






/*
|--------------------------------------------------------------------------
| ADMIN BRAND routes
|--------------------------------------------------------------------------
|
| Here is where you can register USER routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('brand')->group(function () {
    Route::get('view', [BrandController::class,'brandView'])->name('brand.all');
    Route::post('store', [BrandController::class,'brandStore'])->name('brand.store');
    Route::get('edit/{id}', [BrandController::class,'brandEdit'])->name('brand.edit');
    Route::post('update', [BrandController::class,'brandUpdate'])->name('brand.update');
});