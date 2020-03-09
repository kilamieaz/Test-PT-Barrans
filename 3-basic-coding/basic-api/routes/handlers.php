<?php

Route::namespace('Auth')->name('auth.')->group(function () {
    Route::post('login', LoginHandler::class)->name('login');
    Route::post('register', RegisterHandler::class)->name('register');
    Route::post('logout', LogoutHandler::class)->name('logout')->middleware(['auth:airlock']);
});

Route::middleware(['auth:airlock'])->group(function () {
    Route::namespace('Product')->name('products.')->group(function () {
        Route::get('products', IndexProduct::class)->name('index');
        Route::middleware(['roles:merchant'])->group(function () {
            Route::post('products', StoreProduct::class)->name('store');
            Route::put('products/{product}', UpdateProduct::class)->name('update');
            Route::delete('products/{product}', DestroyProduct::class)->name('destroy');
        });
    });

    Route::namespace('Transaction')->name('transactions.')->group(function () {
        Route::post('transactions', StoreTransaction::class)->name('store');
    });

    Route::namespace('User')->name('users.')->group(function () {
        Route::get('users', IndexUser::class)->name('index');
    });
});
