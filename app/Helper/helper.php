<?php

use App\Mail\OrderEmail;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductImage;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;




if (!function_exists('set_active')) {
    function set_active(array $routes, $activeClass = 'active') {
        foreach ($routes as $route) {
            if (Route::currentRouteName() === $route) {
                return $activeClass;
            }
        }
        return '';
    }
}
