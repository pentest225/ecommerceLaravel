<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\FrontEnd\IndexController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix'=>'admin','middleware'=>'admin:admin'],function(){
    Route::get('/login', [AdminController::class,'loginForm']);
    Route::post('/login', [AdminController::class,'store'])->name('admin.login');
});

/*
|--------------------------------------------------------------------------
| Admin Dashbord routes
|--------------------------------------------------------------------------
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
*/


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class,'index']);






/*
|--------------------------------------------------------------------------
| ADMIN BRAND routes
|--------------------------------------------------------------------------
*/

Route::prefix('brand')->group(function () {
    Route::get('view', [BrandController::class,'brandView'])->name('brand.all');
    Route::post('store', [BrandController::class,'brandStore'])->name('brand.store');
    Route::get('edit/{id}', [BrandController::class,'brandEdit'])->name('brand.edit');
    Route::post('update', [BrandController::class,'brandUpdate'])->name('brand.update');
    Route::get('delete/{id}', [BrandController::class,'brandDelate'])->name('brand.delete');
});
/*
|--------------------------------------------------------------------------
| ADMIN CATEGORY routes
|--------------------------------------------------------------------------
*/

Route::prefix('category')->group(function () {
    Route::get('view', [CategoryController::class,'categoryView'])->name('category.all');
    Route::post('store', [CategoryController::class,'categoryStore'])->name('category.store');
    Route::get('edit/{id}', [CategoryController::class,'categoryEdit'])->name('category.edit');
    Route::post('update', [CategoryController::class,'categoryUpdate'])->name('category.update');
    Route::get('delete/{id}', [CategoryController::class,'categoryDelate'])->name('category.delete');
    /*
    |--------------------------------------------------------------------------
    | ADMIN SUBCATEGORY routes
    |--------------------------------------------------------------------------
    */
    Route::get('sub/view', [SubCategoryController::class,'subCategoryView'])->name('sub.category.all');
    Route::post('sub/store', [SubCategoryController::class,'subCategoryStore'])->name('sub.category.store');
    Route::get('sub/edit/{id}', [SubCategoryController::class,'subCategoryEdit'])->name('sub.category.edit');
    Route::post('sub/update', [SubCategoryController::class,'subCategoryUpdate'])->name('sub.category.update');
    Route::get('sub/delete/{id}', [SubCategoryController::class,'subCategoryDelate'])->name('sub.category.delete');
    /*
    |--------------------------------------------------------------------------
    | ADMIN SUB_SUBCATEGORY routes
    |--------------------------------------------------------------------------
    */
    Route::get('sub/cat/json/{category_id}',[SubSubCategoryController::class,'getSubCategoryByCategoryId']);
    Route::get('sub/sub/cat/json/{subcategory_id}',[SubSubCategoryController::class,'getSubSubCategoryBySubCategoryId']);
    Route::get('sub/sub/cat/view', [SubSubCategoryController::class,'subSubCategoryView'])->name('sub.sub_category.all');
    Route::post('sub/sub/store', [SubSubCategoryController::class,'subSubCategoryStore'])->name('sub.sub_category.store');
    Route::get('sub/sub/edit/{id}', [SubSubCategoryController::class,'subCategoryEdit'])->name('sub.sub_category.edit');
    Route::post('sub/sub/update', [SubSubCategoryController::class,'subCategoryUpdate'])->name('sub.sub_category.update');
    Route::get('sub/sub/delete/{id}', [SubSubCategoryController::class,'subCategoryDelate'])->name('sub.sub_category.delete');
});


/*
|--------------------------------------------------------------------------
| ADMIN PRODUCT routes
|--------------------------------------------------------------------------
*/

Route::prefix('product')->group(function () {
    Route::get('create', [ProductController::class,'create'])->name('product.create');

    
});