<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Fontend\ControllerHome;
use Illuminate\Support\Facades\Route;

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

Route::prefix('Admin')->group(function(){
    Route::get('/Login',[LoginController::class,'login']);
    Route::post('/post',[LoginController::class,'post'])->name('login.post');
    Route::get('/Home',[HomeController::class,'index']);
    Route::prefix('/Category')->group(function(){
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/list','list')->name('category.list')->middleware('can:category-list');
            Route::get('/add','add')->name('category.add');
            Route::post('/store','store')->name('category.store');
            Route::get('/edit/{id}','edit')->name('category.edit');
            Route::post('/update/{id}','update')->name('category.update');
            Route::get('/delete/{id}','delete')->name('category.delete');
        });
    });
    Route::prefix('/Menu')->group(function(){
        Route::controller(MenuController::class)->group(function(){
            Route::get('/list','index')->name('menu.list');
            Route::get('/add','create')->name('menu.add');
            Route::post('/store','store')->name('menu.store');
            Route::get('/edit/{id}','edit')->name('menu.edit');
            Route::post('/update/{id}','update')->name('menu.update');
            Route::get('/delete/{id}','destroy')->name('menu.delete');
        });
    });
    Route::prefix('/Product')->group(function(){
        Route::controller(ProductController::class)->group(function(){
            Route::get('/list','index')->name('product.list');
            Route::get('/add','create')->name('product.add');
            Route::post('/store','store')->name('product.store');
            Route::get('/edit/{id}','edit')->name('product.edit');
            Route::post('/update/{id}','update')->name('product.update');
            Route::get('/delete/{id}','destroy')->name('product.delete');
        });
    });
    Route::prefix('/Slider')->group(function(){
        Route::controller(SliderController::class)->group(function(){
            Route::get('/list','index')->name('slider.list');
            Route::get('/add','create')->name('slider.add');
            Route::post('/store','store')->name('slider.store');
            Route::get('/edit/{id}','edit')->name('slider.edit');
            Route::post('/update/{id}','update')->name('slider.update');
            Route::get('/delete/{id}','destroy')->name('slider.delete');
        });
    });
    Route::prefix('/Setting')->group(function(){
        Route::controller(SettingController::class)->group(function(){
            Route::get('/list','index')->name('setting.list');
            Route::get('/add','create')->name('setting.add');
            Route::post('/store','store')->name('setting.store');
            Route::get('/edit/{id}','edit')->name('setting.edit');
            Route::post('/update/{id}','update')->name('setting.update');
            Route::get('/delete/{id}','destroy')->name('setting.delete');
        });
    });
    Route::prefix('/Permission')->group(function(){
        Route::controller(PermissionController::class)->group(function(){
            Route::get('/add','create')->name('permission.add');
            Route::post('/store','store')->name('permission.store');

        });
    });
    Route::prefix('/Role')->group(function(){
        Route::controller(RoleController::class)->group(function(){
            Route::get('/list','index')->name('role.list');
            Route::get('/add','create')->name('role.add');
            Route::post('/store','store')->name('role.store');
            Route::get('/edit/{id}','edit')->name('role.edit');
            Route::post('/update/{id}','update')->name('role.update');
            Route::get('/delete/{id}','destroy')->name('role.delete');
        });
    });
    Route::prefix('/User')->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('/list','index')->name('user.list');
            Route::get('/add','create')->name('user.add');
            Route::post('/store','store')->name('user.store');
            Route::get('/edit/{id}','edit')->name('user.edit');
            Route::post('/update/{id}','update')->name('user.update');
            Route::get('/delete/{id}','destroy')->name('user.delete');
        });
    });

});
//fontend//
Route::prefix('/Eshop')->group(function(){
    Route::prefix('/Home')->group(function(){
        Route::controller(ControllerHome::class)->group(function(){
            Route::get('/','index')->name('home');
            Route::get('/login','login')->name('customer');
            Route::post('/postlogin','postlogin')->name('postcustomer');
            // Route::get('/cart/{id}','addTocart')->name('cart.index');
            Route::get('/cart/{id}','addTocart')->name('cart.index');
            Route::get('/detail','detail')->name('cart.cart');
            Route::get('/update','cart')->name('cart.update');
            Route::get('/delete','cartdelete')->name('cart.delete');
            Route::get('/checkout','checkout')->name('cart.checkout');
            Route::post('/check','checkouts')->name('cart.check');
        });
    });
});
