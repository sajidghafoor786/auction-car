<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\ShopController;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\ShippingCharge;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\user\CheckOutController;
// use App\Http\Controllers\Auth\RegisterController;

// user controller start 
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\DiscountCoupenController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\user\auth\LoginController;
use App\Http\Controllers\Admin\Sub_categoryController;
use App\Http\Controllers\user\auth\RegisterController;
use App\Http\Controllers\admin\ShippingChargeController;
use App\Http\Controllers\Admin\ProductSubCategoryController;
use App\Http\Controllers\user\MyOrderController;
use App\Http\Controllers\user\WishListController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/test', function () {
//     OrderEmailSend(58);
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
Auth::routes();
// after authentication show who page show deciede route  
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Login and Logout Routes...

// admin deshboard route in whitch  isAdmin middleware 
Route::middleware(['isAdmin'])->group(function () {
    // Define your admin routes here
    Route::get('/Dashboard', [AdminController::class, 'index'])->name('Dashboard');
    //  category Route 
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::POST('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::DELETE('/category/deleteimage/{id}', [CategoryController::class, 'deleteimage'])->name('category.deleteimage');
    //  Sub_category Route 
    Route::get('/sub_category', [Sub_categoryController::class, 'index'])->name('sub_category');
    Route::POST('/sub_category/create', [Sub_CategoryController::class, 'create'])->name('sub_category.create');
    Route::get('/sub_category/delete/{id}', [Sub_categoryController::class, 'destroy'])->name('sub_category.delete');
    Route::get('/sub_category/edit/{id}', [Sub_categoryController::class, 'edit'])->name('sub_category.edit');
    Route::put('/sub_category/update', [Sub_categoryController::class, 'update'])->name('sub_category.update');
    Route::DELETE('/sub_category/deleteimage/{id}', [Sub_categoryController::class, 'deleteimage'])->name('Sub_category.deleteimage');
    //  Brands Route 
    Route::get('/brands', [BrandsController::class, 'index'])->name('brands');
    Route::POST('/brands/create', [BrandsController::class, 'create'])->name('brands.create');
    Route::get('/brands/delete/{id}', [BrandsController::class, 'destroy'])->name('brands.delete');
    Route::get('/brands/edit/{id}', [BrandsController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/update', [BrandsController::class, 'update'])->name('brands.update');
    Route::DELETE('/brands/deleteimage/{id}', [BrandsController::class, 'deleteimage'])->name('brands.deleteimage');
    //  products Route 
    Route::get('/products', [ProductsController::class, 'index'])->name('products');
    Route::POST('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::get('/products/delete/{id}', [ProductsController::class, 'destroy'])->name('products.delete');
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::get('/products/test', [ProductsController::class, 'store'])->name('products.edit');
    Route::put('/products/update', [ProductsController::class, 'update'])->name('products.update');
    Route::get('/products/deleteimage/{id}', [ProductsController::class, 'deleteimage'])->name('products.deleteimage');
    // Shipping cgarge routre 
    Route::get('/shipping', [ShippingChargeController::class, 'index'])->name('shipping');
    Route::POST('/shipping/create', [ShippingChargeController::class, 'create'])->name('shipping.create');
    Route::get('/shipping/delete/{id}', [ShippingChargeController::class, 'destroy'])->name('shipping.destroy');
    Route::post('/shipping/edit/{id}', [ShippingChargeController::class, 'edit'])->name('shipping.edit');
    Route::post('/shipping/update', [ShippingChargeController::class, 'update'])->name('shipping.update');
    // Discount Coupen routre 
    Route::get('/coupen', [DiscountCoupenController::class, 'index'])->name('coupen');
    Route::POST('/coupen/create', [DiscountCoupenController::class, 'create'])->name('coupen.create');
    Route::get('/coupen/delete/{id}', [DiscountCoupenController::class, 'destroy'])->name('coupen.destroy');
    Route::get('/coupen/edit/{id}', [DiscountCoupenController::class, 'edit'])->name('coupen.edit');
    Route::post('/coupen/update', [DiscountCoupenController::class, 'update'])->name('coupen.update');
    // orderList And Order Details routre 
    Route::get('/order', [OrderController::class, 'index'])->name('orderList');
    Route::get('/order-details/{id}', [OrderController::class, 'OrderDetails'])->name('order-detail');
    Route::post('/order/update/{id}', [OrderController::class, 'OrderStatusUpdate'])->name('order.update');
    Route::post('/send_invoice/{id}', [OrderController::class, 'InvoiceEmail'])->name('sendInvoce_email');
// All user  routre 
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    // ProductSubCategory Route here 
    Route::get('/product_sub_category', [ProductSubCategoryController::class, 'index'])->name('product_sub_category');
});

// User all route here and registration and login 
Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        // this route before authenticated accessable
        // register route 
        Route::get('/register', [RegisterController::class, 'register'])->name('user.register');
        Route::post('/process-register', [RegisterController::class, 'ProcessRegister'])->name('user.process-register');
        //    login route 
        Route::get('/login', [LoginController::class, 'login'])->name('user.login');
        Route::post('/authenticate-process', [LoginController::class, 'AuthenticateProcess'])->name('user.authenticate-process');
    });
    Route::group(['middleware' => 'auth'], function () {
        // this route after authenticated accessable
        Route::get('/logout', [LoginController::class, 'LogOut'])->name('user.logout');
        Route::get('/profile', [LoginController::class, 'profile'])->name('user.profile');
        Route::get('/order', [MyOrderController::class, 'MyOrder'])->name('user.MyOrder');
        Route::get('/order-details/{id}', [MyOrderController::class, 'MyOrderDetails'])->name('user.MyOrderDetails');
        // wishlist route 
        Route::get('/wishlist', [WishListController::class, 'index'])->name('user.wishlist');
    });
});
// show defalte user page  
Route::get('/', function () {
    return view('user.index');
})->name('user.home');
// shopping route  
Route::get('shop/{categorySlug?}/{subcatgorySlug?}', [ShopController::class, 'index'])->name('user.shop');
Route::get('product/{slug}', [ShopController::class, 'SingleProductShow'])->name('user.product');
// cart route 
Route::get('cart', [CartController::class, 'ShowCart'])->name('user.cart');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('user.add-to-cart');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('user.update-cart');
Route::post('delete-cart', [CartController::class, 'DeleteCart'])->name('user.delete-cart');
// wishlist route 
Route::post('/wishlist-added', [WishListController::class, 'WishListAdded'])->name('user.wishlist-added');
Route::post('/wishlist-delete', [WishListController::class, 'WishListDeleted'])->name('user.delete-wislist');

//checkout route 
Route::get('checkout-cart', [CheckOutController::class, 'CheckOut'])->name('user.checkout-cart');
Route::post('process-checkout', [CheckOutController::class, 'ProcessCheckout'])->name('user.process-checkout');
// onchange country shipping charges change route 
Route::post('/shipping-ordersummery', [CheckOutController::class, 'OrderSummeryShipping'])->name('user.checkoutShipping');
// onclick discount coupooen apply route 
Route::get('/discount-coupen-apply', [CheckOutController::class, 'DiscountApply'])->name('user.DiscountApply');
Route::get('/Thanks/{order}', [CheckOutController::class, 'Thankyou'])->name('user.Thankyou');

