<?php

use App\Http\Controllers\DashboardController;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;

Route::post('/send-message', [ContactController::class, 'sendMessage']);


Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/features', function () {
    return view('keunggulan', [
        "title" => "Keunggulan"
    ]);
});

Route::get('/testimoni', function () {
    return view('testimoni', [
        "title" => "Testimoni"
    ]);
});

Route::get('/produk', [ProdukController::class, 'index']);

Route::get('/produk/{produkid:slug}', [ProdukController::class, 'show']);

Route::get('/faq', function () {
    return view('faq', [
        "title" => "FAQ"
    ]);
});

Route::get('/tentang', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/kategori/{kategori:slug}', [KategoriController::class, 'index']);

Route::get('/allkategori', function () {
    return view('allkategori', [
        "title" => "Produk Kategori",
        "kategori" => Kategori::all()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/produk', DashboardController::class)->middleware('auth');
