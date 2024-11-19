<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/features', function () {
    return view('keunggulan');
});

Route::get('/testimoni', function () {
    return view('testimoni');
});

Route::get('/produk', [ProdukController::class,'index']);
Route::get('/produk/{produk}', [ProdukController::class,'show']);

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/tentang', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});

