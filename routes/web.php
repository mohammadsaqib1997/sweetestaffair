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

Route::group(['prefix' => '/', 'middleware' => 'private'], function () {
    Route::get('/under-construction', function () {
        return view('under-const');
    })->name('construction');

    Route::get('/cakes', function () {
        return view('cakes');
    })->name('cakes');

    Route::get('', function () {
        return view('main');
    })->name('main');
    Route::get('/about-us', function () {
        return view('about');
    })->name('about');
    Route::get('/shop', "MainController@shop")->name('shop');
    // Route::get('/product/{id}', function ($id) {
    //     return view('product', ['slide' => $id]);
    // })->name('product');
    Route::get('/contact-us', function () {
        return view('contact');
    })->name('contact');
    Route::get('/search', function () {
        return view('search');
    })->name('search');

    Route::get('/special-occasions', function () {
        return view('special-occasion');
    })->name('spec-occas');

    Route::get('/chocolates', function () {
        return view('chocolates');
    })->name('chocolates');

    Route::group(['prefix' => 'events'], function () {
        Route::get('/', function () {
            return view('events');
        })->name('events');

        Route::get('/baby-showers', function () {
            return view('events.baby-showers');
        })->name('eve-bb-shower');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/florals', function () {
            return view('florals');
        })->name('florals');

        Route::get('/luxury-box', function () {
            return view('luxury-box');
        })->name('luxury-box');

        Route::get('/hampers', function () {
            return view('hampers');
        })->name('hampers');
    });;
});
