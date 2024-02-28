<?php

use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [AppController::class, 'index']) ->name('app.index');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Auth::routes();

//Akses sebagai user
Route::middleware(['auth', 'auth.user'])->group(function () {
    // Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/profile', [UserController::class,'index']) ->name('users.index');
    Route::get('user/edit', [UserController::class,'edit']) ->name('users.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('user/history', [UserController::class,'history']) ->name('users.history');
    Route::get('/user/history/order/{id}', [UserController::class, 'historyDetail'])->name('users.historydetail');
    Route::get('user/aboutus', [UserController::class,'aboutUs']) ->name('users.aboutus');
    Route::get('user/contactus', [UserController::class,'contactUs']) ->name('users.contactus');
    Route::post('user/contactus/send', [UserController::class,'sendMessage']) ->name('users.sendmessage');
    //Cart
    Route::get('/cart', [CartController::class,'index']) ->name('users.cart');
    Route::post('/cart/store', [CartController::class,'addToCart']) ->name('cart.store');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
    Route::delete('/delete/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/users/cart/clear-all', [CartController::class, 'clearAllItems'])->name('cart.clearAll');
    //End Cart
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/shop', [ShopController::class,'index'])->name('shop.index');
    Route::get('/shop/product/{id}', [ShopController::class,'productDetails'])->name('users.shopdetails');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function (){

});

//Akses sebagai admin
Route::middleware(['auth', 'auth.admin'])->group(function (){
    Route::get('/admin', [AdminController::class,'index']) ->name('admin.index');
    Route::get('/admin/profile', [AdminController::class, 'show'])->name('admin.adminprofile');
    Route::get('/admin/profile/edit', [AdminController::class, 'edit'])->name('admin.adminprofileedit');
    Route::put('/admin/profile/update', [AdminController::class, 'update'])->name('admin.updateadmin');
    //CRUD brand
    Route::get('/admin/viewbrand', [AdminBrandController::class,'index']) ->name('admin.brand');
    Route::get('/admin/createbrand', [AdminBrandController::class,'create']) ->name('admin.brandcreate');
    Route::post('/admin/storebrand', [AdminBrandController::class,'store']) ->name('admin.storebrand');
    Route::get('/admin/brand/edit/{id}', [AdminBrandController::class, 'edit'])->name('admin.brand_edit');
    Route::put('/admin/brand/update/{id}', [AdminBrandController::class, 'update'])->name('admin.updatebrand');
    Route::delete('/admin/delete/brand/{id}', [AdminBrandController::class, 'destroy'])->name('admin.destroybrand');
    //end CRUD
    //CRUD product
    Route::get('/viewproduct', [AdminProductController::class,'index']) ->name('admin.product');
    Route::get('/product/{id}', [AdminProductController::class, 'show'])->name('admin.product_detail');
    Route::get('/createproduct', [AdminProductController::class,'create']) ->name('admin.productcreate');
    Route::post('/storeproduct', [AdminProductController::class,'store']) ->name('admin.storeproduct');
    Route::get('/product/edit/{id}', [AdminProductController::class, 'edit']) ->name('admin.product_edit');
    Route::put('/product/update/{id}', [AdminProductController::class, 'update'])->name('admin.updateproduct');
    Route::delete('/delete/product/{id}', [AdminProductController::class, 'destroy'])->name('admin.destroyproduct');
    //end CRUD
    //CRUD user
    Route::get('/viewuser', [AdminUserController::class,'index']) ->name('admin.user');
    Route::get('/user/{id}', [AdminUserController::class, 'show'])->name('admin.user_detail');
    Route::get('/user/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user_edit');
    Route::put('/user/update/{id}', [AdminUserController::class, 'update'])->name('admin.updateuser');
    Route::get('/createuser', [AdminUserController::class,'create']) ->name('admin.usercreate');
    Route::post('/storeuser', [AdminUserController::class,'store']) ->name('admin.storeuser');
    Route::delete('/delete/user/{id}', [AdminUserController::class, 'destroy'])->name('admin.destroyuser');
    //end CRUD
    //CRUD category
    Route::get('/viewcategory', [AdminCategoryController::class, 'index'])->name('admin.category');
    Route::get('/createcategory', [AdminCategoryController::class,'create']) ->name('admin.categorycreate');
    Route::post('/storecategory', [AdminCategoryController::class,'store']) ->name('admin.storecategory');
    Route::get('/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category_edit');
    Route::put('/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.updatecategory');
    Route::delete('/delete/category/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.destroycategory');
    //end CRUD
    Route::get('/admin/viewtransaction', [AdminTransactionController::class,'index']) ->name('admin.transaction');
    Route::put('/admin/viewtransaction/order/{id}/complete', [AdminTransactionController::class, 'complete'])->name('orders.complete');
    Route::get('/viewmessage', [AdminMessageController::class,'index']) ->name('admin.message');
    Route::get('/viewmessage/{id}', [AdminMessageController::class,'show']) ->name('admin.messagedetail');
    Route::delete('/delete/message/{id}', [AdminMessageController::class, 'destroy'])->name('admin.destroymessage');
});
