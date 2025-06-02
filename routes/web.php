<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers;

// admin login route 
Route::get('/admin/login', 'Admin\AuthController@adminLoginPage')->name('loginPage');
Route::post('/login', 'Admin\AuthController@login')->name('admin.login');
// admin dashboard route
Route::middleware(['isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    // admin Dashboard routes 
    Route::get('/dashboard', 'Admin\AdminController@Dashboard')->name('dashboard');
    // manage user for admin side route 
    Route::get('/admin-list', 'Admin\AdminController@index')->name('listUsers');
    Route::get('/create', 'Admin\AdminController@create')->name('createUser');
    Route::post('/save', 'Admin\AdminController@save')->name('saveUser');
    Route::get('/edit/{id}', 'Admin\AdminController@edit')->name('editUser');
    Route::post('/update', 'Admin\AdminController@update')->name('updateUser');
    Route::get('/view/{id}', 'Admin\AdminController@show')->name('viewUser');
    Route::post('/delete', 'Admin\AdminController@destroy')->name('deleteUser');
    Route::post('/status', 'Admin\AdminController@status')->name('changeStatus');
    //  auction car route 
    Route::get('cars', 'Admin\CarController@index')->name('cars.index');
    Route::get('cars/create', 'Admin\CarController@create')->name('cars.create');
    Route::post('cars', 'Admin\CarController@store')->name('cars.store');
    Route::get('cars/{car}', 'Admin\CarController@show')->name('cars.show');
    Route::get('cars/{car}/edit', 'Admin\CarController@edit')->name('cars.edit');
    Route::post('cars/update', 'Admin\CarController@update')->name('cars.update');
    Route::delete('cars/{car}', 'Admin\CarController@destroy')->name('cars.destroy');
    Route::post('cars/status', 'Admin\CarController@status')->name('cars.changeStatus');
    //  auction route 
    Route::get('car-auctions', 'Admin\AuctionController@index')->name('carAuction.index');
    Route::get('car-auctions/create', 'Admin\AuctionController@create')->name('carAuction.create');
    Route::post('car-auctions/store', 'Admin\AuctionController@store')->name('carAuction.store');
    Route::get('car-auctions/{auction}/edit', 'Admin\AuctionController@edit')->name('carAuction.edit');
    Route::post('car-auctions/{auction}/update', 'Admin\AuctionController@update')->name('carAuction.update');
    Route::get('car-auctions/{auction}', 'Admin\AuctionController@show')->name('carAuction.show');
    Route::delete('car-auctions/{auction}/delete', 'Admin\AuctionController@destroy')->name('carAuction.delete');
    Route::post('car-auctions/status', 'Admin\AuctionController@status')->name('carAuction.changeStatus');
    //  bids route 
    Route::get('bids', 'Admin\BidController@index')->name('bid.index');
    Route::get('bids/create', 'Admin\BidController@create')->name('bid.create');
    Route::post('bids/store', 'Admin\BidController@store')->name('bid.store');
    Route::get('bids/{id}', 'Admin\BidController@show')->name('bid.show');
    // reset password
    Route::get('/change-password', 'Admin\AuthController@adminPasswordPage')->name('adminPasswordPage');
    Route::post('/password', 'Admin\AuthController@adminPassword')->name('passwordAdmin');
});

// all frontend route define here
Route::group(['prefix' => 'account'], function () {
    // this is guest route 
    Route::group(['middleware' => 'guest'], function () {
        // register route 
        Route::get('/register', 'RegisterController@register')->name('user.register');
        Route::post('/process-register', 'RegisterController@ProcessRegister')->name('user.process-register');
        //    login route 
        Route::get('/login', 'LoginController@login')->name('user.login');
        Route::post('/authenticate-process', 'LoginController@AuthenticateProcess')->name('user.authenticate-process');
    });
    // this is authenticated route
    Route::group(['middleware' => 'auth'], function () {
        // this route after authenticated accessable
        Route::get('/logout', 'LoginController@LogOut')->name('user.logout');
        Route::get('/profile', 'LoginController@profile')->name('user.profile');
        Route::post('/profile', 'LoginController@profileUpdate')->name('user.profileUpdate');
        // reset password route
        Route::get('/reset-password', 'LoginController@resetFormShow')->name('user.resetFormShow');
        Route::post('/reset-password', 'LoginController@resetPassword')->name('user.reset-password');
        // auction route for after auth access login required
        Route::get('/auction-detail/{auction}', 'FrontController@auctionDetail')->name('auctionDetail');
        Route::post('/auction-bid', 'FrontController@auctionAddBid')->name('add-bid');
        Route::get('/auction-biding-history', 'FrontController@myBidHistory')->name('bidding.history');
    });
});

Route::get('/', 'FrontController@frontHome')->name('frontHome');
Route::get('/ajax-search-auctions', 'FrontController@ajaxHomeSearch')->name('ajax.search.auctions');
// Route::get('/Thanks/{order}', [CheckOutController::class, 'Thankyou'])->name('user.Thankyou');
