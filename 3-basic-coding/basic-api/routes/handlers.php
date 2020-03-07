<?php

use Illuminate\Http\Request;

Route::middleware(['auth:airlock'])->group(function () {
    Route::post('logout', 'Auth\LogoutHandler')->name('auth.logout');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('products', 'Product\IndexProduct')->name('products.index');
    Route::middleware(['roles:merchant'])->group(function () {
        Route::post('products', 'Product\StoreProduct')->name('products.store');
        Route::put('products/{product}', 'Product\UpdateProduct')->name('products.update');
        Route::delete('products/{product}', 'Product\DestroyProduct')->name('products.destroy');
    });

    Route::post('transactions', 'Transaction\StoreTransaction')->name('transactions.store');
});

Route::post('login', 'Auth\LoginHandler')->name('auth.login');
Route::post('register', 'Auth\RegisterHandler')->name('auth.register');
