<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;


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

        // Hapus artikel yang diposting oleh user
        $articles = $user->Artikel;
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
        return redirect()->back()->with('success', 'User dan semua Artikel serta Galeri terkait telah dihapus.');
    }
}
