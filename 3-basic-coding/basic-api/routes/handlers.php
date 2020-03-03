<?php
use Illuminate\Http\Request;

Route::middleware(['auth:airlock'])->group(function () {
    Route::post('logout', 'Auth\LogoutHandler');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
Route::post('login', 'Auth\LoginHandler');
Route::post('register', 'Auth\RegisterHandler');
