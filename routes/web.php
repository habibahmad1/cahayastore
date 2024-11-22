<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Models\Kategori;
use App\Models\Produk;

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/features', function () {
    return view('keunggulan',[
        "title" => "Keunggulan"
    ]);
});

Route::get('/testimoni', function () {
    return view('testimoni',[
        "title" => "Testimoni"
    ]);
});

Route::get('/produk', [ProdukController::class,'index']);

Route::get('/produk/{produkid:slug}', [ProdukController::class,'show']);

Route::get('/faq', function () {
    return view('faq',[
        "title" => "FAQ"
    ]);
});

Route::get('/tentang', function () {
    return view('about',[
        "title" => "About"
    ]);
});

Route::get('/login', function () {
    return view('login',[
        "title" => "Login"
    ]);
});


Route::get('/kategori/{kategori:slug}',[KategoriController::class,'index']);

Route::get('/allkategori', function () {
    return view('allkategori',[
        "title" => "Produk Kategori",
        "kategori" => Kategori::all()
    ]);
});
