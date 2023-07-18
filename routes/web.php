<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderManaController;
use App\Http\Controllers\CustomerController;

Route::get('/',function (){
    return view('pages.homeuser');
});
//Route::get('/trang-chu',[App\Http\Controllers\HomeController::class,'index']);
Route::get('/',[IndexController::class ,'home']);
Route::get('/danh-muc/{id_category}',[IndexController::class ,'show_category']);
Route::get('/thuong-hieu/{id}',[IndexController::class ,'show_brand']);
Route::get('/chi-tiet-san-pham/{id_product}',[IndexController::class ,'show_product']);


///////////////Shoppingcart
Route::post('add-cart/{id_product}',[CartController::class,'showcart']);
Route::post('/update-cart-quantity',[CartController::class,'update_cart_quantity']);
Route::get('/show-cart',[CartController::class,'show_cart']);
Route::get('/delete-to-cart/{rowId}',[CartController::class,'delete_to_cart']);
/////////////Checkout
Route::get('/login-checkout',[CheckoutController::class,'login_checkout']);
Route::get('/logout-checkout',[CheckoutController::class,'logout_checkout']);

Route::post('/add-shipping',[CheckoutController::class,'add_shipping']);
//thanhtoan
Route::get('/payment',[CheckoutController::class,'payment']);
Route::post('/order-payment',[CheckoutController::class,'order_payment']);
Route::post('/p-payment',[CheckoutController::class,'p_payment']);
Route::get('/notify',[CheckoutController::class,'notify']);
//giaohang
Route::get('/express-delivery',[CheckoutController::class,'express_delivery']);
//Customer
Route::post('/add-customer',[CheckoutController::class,'add_customer']);
Route::post('/login-customer',[CheckoutController::class,'login_customer']);
Route::get('/checkout',[CheckoutController::class,'checkout']);


//Login google
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-google');
Route::get('google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);


////////////////////quanlydonhang
Route::get('/manage-order',[CheckoutController::class,'manage_order']);
Route::get('/view-order/{id_order}',[CheckoutController::class,'view_order']);

//////////////////order
Route::post('/update-order/{id_detailsorder}',[OrderController::class,'update_order']);
Route::post('/update-status/{id_order}',[OrderController::class,'update_status']);
Route::post('/update-shipping/{id_shipping}',[OrderController::class,'update_shipping']);
Route::get('/delete-order/{id_order}',[OrderController::class,'delete_order']);


/////////////Reset pass
Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');



///Danh muc san pham
Route::resource('/danhmuc',CategoryController::class);
////Brand
Route::resource('/thuonghieu',BrandController::class);
///Product
Route::resource('/sanpham',ProductController::class);
//Customer
Route::resource('/khachhang',CustomerController::class);
//Order
Route::resource('/donhang',OrderManaController::class);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
