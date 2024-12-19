<?php

use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\KategoriArtikel;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Route;



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

Route::get('/artikel', function () {
    return view('artikel', [
        "title" => "Semua Artikel",
        "artikel" => Artikel::latest()->filtercoy()->paginate(10)->withQueryString(),
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

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware(['guest', 'login.access']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/set-login-access', [LoginController::class, 'setLoginAccess']);

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
    return view('dashboard.index', [
        "produk" => Produk::all(),
        "kategori" => Kategori::all(),
        "user" => User::all()
    ]);
})->middleware('auth');

Route::resource('/dashboard/produk', DashboardController::class)->middleware('auth');

Route::resource('/dashboard/kategori', AdminKategoriController::class)->middleware(['auth', 'admin']);

Route::resource('/dashboard/artikel', ArtikelController::class)->middleware(['auth']);

// Route untuk data page
Route::get('/dashboard/data', function () {
    return view('dashboard.data', [
        'data' => User::all()
    ]);
})->middleware(['auth', 'admin']);

Route::delete('/dashboard/deleteUser', [UserController::class, 'deleteUser'])->name('user.deleteUser')->middleware(['auth', 'admin']);

Route::get('/dashboard/jadiAdmin/{id}', [UserController::class, 'jadiAdmin'])->middleware(['auth', 'admin']);

Route::get('/dashboard/jadiUser/{id}', [UserController::class, 'makeUser'])->middleware(['auth', 'admin']);


// Route::get('/dashboard/artikel/cekSlug', [ArtikelController::class, 'cekSlug']);


Route::get('/artikel/{slug}', function ($slug) {
    // Cari artikel berdasarkan slug
    $artikel = Artikel::where('slug', $slug)->firstOrFail();

    // Tampilkan view untuk halaman public
    return view('artikel.public', [
        'title' => 'Artikel',
        'artikel' => $artikel,

    ]);
})->name('artikel.public.show');

// Route ke user posting
Route::get('/authors/{author:username}', [UserController::class, "index"]);

// Route ke category
Route::get('/categories/{kategoripost:slug}', function (KategoriArtikel $kategoripost) {
    return view('kategoripost', [
        "title" => $kategoripost->nama,
        "artikelPost" => $kategoripost->artikel(),
        "category" => $kategoripost->nama
    ]);
});



// Route ke Semua category
Route::get('/categories', function () {
    return view('categories', [
        "title" => 'All Categories',
        "categories" => KategoriArtikel::all()
    ]);
});

// Kategori Artikel
Route::resource('/dashboard/kategoriartikel', KategoriArtikelController::class)->middleware(['auth', 'admin']);


// Route untuk tampil form lupa pw
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request')->middleware('guest');


// Route untuk kirim email
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email')->middleware('guest');

// Untuk tampil form Lupa PW
Route::get('reset-password/{token}/{email}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');

// Untuk proses form lupa pw
Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
