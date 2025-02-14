<?php

use App\Models\User;
use App\Models\Produk;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\KategoriArtikel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\KategoriArtikelController;




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
        "user" => User::all(),
        "artikel" => Artikel::all()
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

// Route ke kategori
Route::get('/category/{kategoriartikel:slug}', function (KategoriArtikel $kategoriartikel) {
    return view('artikel', [
        "title" => 'Artikel Kategori: ' . $kategoriartikel->nama,
        "artikel" => $kategoriartikel->artikel()->latest()->paginate(10), // Memfilter berdasarkan kategori
        "category" => $kategoriartikel->nama,
    ]);
});

// Route ke Semua category
Route::get('/categories', function () {
    return view('kategoripost', [
        "title" => 'All Categories',
        "categories" => KategoriArtikel::all(),
        "categoriproduk" => Kategori::all()
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

// Route All Artikel
Route::get('dashboard/allartikel', [ArtikelController::class, 'allartikel'])->middleware(['auth', 'admin'])->name('allartikel');

// Route Setting
Route::get('dashboard/settings/', [SettingController::class, 'index'])->middleware('auth');

// Route Edit User
Route::get('dashboard/settings/edituser', function () {
    return view('resetpassword.edituser', [
        "title" => 'Edit Profil',
        "user" => Auth::user() // Ambil data pengguna yang login
    ]);
})->middleware('auth');

Route::put('/dashboard/settings/updateuser', function (Request $request) {
    // Ambil data pengguna yang sedang login
    $user = Auth::user();

    // Validasi data
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    ]);

    // Update data pengguna
    $user->update([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect('/dashboard/settings')->with('success', 'Profil berhasil diperbarui!');
})->middleware('auth');

// Route Data Barang
Route::resource('/dashboard/databarang', DataBarangController::class)->middleware(['auth', 'admin']);
