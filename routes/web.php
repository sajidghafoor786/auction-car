<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;
use App\Http\Controllers;
// user controller start 
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\user\auth\LoginController;
use App\Http\Controllers\user\auth\RegisterController;


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
Route::middleware(['isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    // Define admin routes 
    Route::get('/dashboard', 'Admin\AdminController@Dashboard')->name('dashboard');
    // user & admin list route 
    Route::get('/admin-list', 'Admin\AdminController@index')->name('listUsers');
    Route::get('/create', 'Admin\AdminController@create')->name('createUser');
    Route::post('/save', 'Admin\AdminController@save')->name('saveUser');
    Route::get('/edit/{id}', 'Admin\AdminController@edit')->name('editUser');
    Route::post('/update', 'Admin\AdminController@update')->name('updateUser');
    Route::get('/view/{id}', 'Admin\AdminController@show')->name('viewUser');
    Route::post('/delete', 'Admin\AdminController@destroy')->name('deleteUser');
    Route::post('/status', 'Admin\AdminController@status')->name('changeStatus');
    //  category Route 
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::POST('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::DELETE('/category/deleteimage/{id}', [CategoryController::class, 'deleteimage'])->name('category.deleteimage');
    //  car route Route 
    Route::get('cars', 'Admin\CarController@index')->name('cars.index');
    Route::get('cars/create', 'Admin\CarController@create')->name('cars.create');
    Route::post('cars', 'Admin\CarController@store')->name('cars.store');
    Route::get('cars/{car}', 'Admin\CarController@show')->name('cars.show');
    Route::get('cars/{car}/edit', 'Admin\CarController@edit')->name('cars.edit');
    Route::post('cars/update', 'Admin\CarController@update')->name('cars.update');
    Route::delete('cars/{car}', 'Admin\CarController@destroy')->name('cars.destroy');
    Route::post('/status', 'Admin\CarController@status')->name('cars.changeStatus');
    // car auction route 
    Route::get('car-auctions', 'Admin\AuctionController@index')->name('carAuction.index');
    Route::get('car-auctions/create', 'Admin\AuctionController@create')->name('carAuction.create');
    Route::post('car-auctions/store', 'Admin\AuctionController@store')->name('carAuction.store');
    Route::get('auctions/{auction}/edit', 'Admin\AuctionController@edit')->name('carAuction.edit');
    Route::post('car-auctions/{auction}/update', 'Admin\AuctionController@update')->name('carAuction.update');
    Route::get('car-auctions/{auction}', 'Admin\AuctionController@show')->name('carAuction.show');
    Route::delete('car-auctions/{auction}/delete', 'Admin\AuctionController@destroy')->name('carAuction.delete');
    Route::post('car-auctions/status', 'Admin\AuctionController@status')->name('carAuction.changeStatus');

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
        Route::post('/profile', [LoginController::class, 'profileUpdate'])->name('user.profileUpdate');
        Route::get('/order', [MyOrderController::class, 'MyOrder'])->name('user.MyOrder');
        Route::get('/order-details/{id}', [MyOrderController::class, 'MyOrderDetails'])->name('user.MyOrderDetails');
        // wishlist route 
        Route::get('/wishlist', [WishListController::class, 'index'])->name('user.wishlist');
    });
});
// show defalte user page  
Route::get('/details', function () {
    return view('frontend.pages.auction');
})->name('user.home');
Route::get('/', 'FrontController@frontHome')->name('frontHome');
Route::get('/auction-detail/{auction}', 'FrontController@auctionDetail')->name('auctionDetail');
Route::post('/auction-bid', 'FrontController@auctionAddBid')->name('add-bid');
Route::get('/auction-biding-history', 'FrontController@myBidHistory')->name('bidding.history');

Route::get('/Thanks/{order}', [CheckOutController::class, 'Thankyou'])->name('user.Thankyou');
