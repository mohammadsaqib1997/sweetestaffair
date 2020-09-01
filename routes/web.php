<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/under-construction', function () {
    return view('under-const');
})->name('construction');

Route::get('/cakes', function () {
    return view('cakes');
})->name('cakes');

Route::get('', 'MainController@index')->name('main');
Route::get('/about-us', function () {
    return view('about');
})->name('about');
Route::get('/shop/{cat?}', "MainController@shop")->name('shop');
Route::get('/eid-specials', "MainController@eidSpecials")->name('eid-shop');
// Route::get('/product/{id}', function ($id) {
//     return view('product', ['slide' => $id]);
// })->name('product');
Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');
Route::post('/contact-us', "MainController@contactMail")->name('contact-mail');

Route::get('/search', 'MainController@searchShop')->name('search');

// Route::get('/special-occasions', function () {
//     return view('special-occasion');
// })->name('spec-occas');

// Route::get('/chocolates', function () {
//     return view('chocolates');
// })->name('chocolates');

Route::group(['prefix' => 'events'], function () {
    Route::get('/', function () {
        return view('events');
    })->name('events');

    Route::get('/baby-showers', function () {
        return view('events.baby-showers');
    })->name('eve-bb-shower');
});

Route::get('/product/{prd_slug}', 'MainController@prdItem')->name('product-item');

Route::post('/order-submit', 'MainController@orderSave');
Route::post('/order-success', 'MainController@storePaymentLog');
Route::get('/payment-success/{sig}', 'MainController@viewPaymentSuccessPage')->name('payment_success');
Route::get('/payment-cancel', 'MainController@viewCancelPaymentPage');
Route::get('/payment-failed', 'MainController@viewFailedPaymentPage')->name('payment-failed');

// Admin panel code here
Route::get('login', 'LoginController@showLoginForm')->name("login");
Route::post('login', 'LoginController@login')->name("login-submit");
Route::post('logout', 'LoginController@logout')->name("logout");

Route::group(['prefix' => '_admin', 'middleware' => ['private', 'auth_admin']], function () {

    Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
        Route::get('/', 'Dashboard@index')->name('dashboard');

        Route::group(['prefix' => 'product'], function () {
            // product
            Route::get('/add-product', 'Product@add')->name('add-product');

            // category
            Route::get('/add-category', 'Category@index')->name('add-cats');
            Route::post('/add-category', 'Category@store')->name('store-cats');
            Route::get('/edit-category/{id}', 'Category@edit')->name('edit-cats');
            Route::put('/edit-category/{id}', 'Category@update')->name('update-cats');
            Route::delete('/delete-category', 'Category@destroy')->name('delete-cats');
        });
    });
});
