<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Category;


// Redirect home to login
Route::get('/', function () {
    return view('/wel_come');
});

// Login & Register pages
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
/*Route::get('/admin-login', function () {
    return view('admin_login');
});*/
Route::get('/admin_login', [AuthController::class,'showAdminLogin'])->name('admin.login');
// Form submissions
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/admin_login', [AuthController::class,'adminLogin']);
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
});
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/admin-logout', [AuthController::class,'adminLogout']);


Route::prefix('admin')->group(function(){

Route::resource('categories',CategoryController::class);

});

Route::prefix('admin')->group(function(){

Route::resource('products',ProductController::class);

});

Route::get('/get-subcategories/{id}',function($id){

return Category::where('parent_id',$id)->get();

});
Route::delete('/product-image/{id}', [ProductController::class, 'deleteImage'])->name('product.image.delete');