<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $author)
    {
        $artikel = Artikel::with(['kategoripost', 'user'])
            ->where('user_id', $author->id)
            ->latest()
            ->paginate(7);

        return view('artikel', [
            'title' => "Artikel By: $author->name",
            'artikel' => $artikel
        ]);
    }

    public function deleteUser(Request $request)
    {
        // Mencari user berdasarkan ID
        $user = User::find($request->user_id);

        // Jika user tidak ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Cek apakah user yang sedang login mencoba menghapus dirinya sendiri
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        // Hapus artikel yang diposting oleh user
        $articles = $user->artikel;
        foreach ($articles as $article) {
            // Hapus gambar terkait artikel, jika ada
            if ($article->image) {
                Storage::delete($article->image);
            }
            $article->delete();
        }

        // Hapus user
        $user->delete();

        // Berikan feedback setelah penghapusan berhasil
        return redirect()->back()->with('success', 'User dan semua Artikel terkait telah dihapus.');
    }

    public function jadiAdmin($id)
    {
        // Cari user berdasarkan ID
        $user = User::find($id);

        // Jika user tidak ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Periksa apakah user sudah admin
        if ($user->is_admin) {
            return redirect()->back()->with('info', 'User ini sudah menjadi admin.');
        }

        // Ubah status is_admin menjadi true
        $user->is_admin = true;
        $user->save();

        // Berikan pesan sukses
        return redirect()->back()->with('success', 'User berhasil dijadikan admin.');
    }

    public function makeUser($id)
    {
        // Cari user berdasarkan ID
        $user = User::find($id);

        // Jika user tidak ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Cek jika yang ingin diubah adalah diri sendiri
        if (Auth::user()->id == $user->id) {
            return redirect()->back()->with('error', 'Anda tidak bisa mengubah status diri sendiri.');
        }

        // Periksa apakah user sudah user biasa
        if (!$user->is_admin) {
            return redirect()->back()->with('info', 'User ini sudah menjadi user biasa.');
        }

        // Ubah status is_admin menjadi false
        $user->is_admin = false;
        $user->save();

        // Berikan pesan sukses
        return redirect()->back()->with('success', 'User berhasil diubah menjadi user biasa.');
    }
}

