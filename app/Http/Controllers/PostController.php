<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\KategoriPost;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.artikel.index', [
            'dataArtikel' => Post::where('user_id', auth()->user()->id)
                ->latest()
                ->filtercoy()
                ->paginate(10)
                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.artikel.create', [
            'data' => KategoriPost::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validasiData = $request->validate([
            'judul' => 'required | max:255',
            'slug' => 'required|unique:artikels',
            'image' => 'image|file|max:2048',
            'kategoripost_id' => 'required',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validasiData['image'] = $request->file('image')->store('artikel-image');
        }

        $validasiData['user_id'] = auth()->user()->id;
        $validasiData['excerpt'] = Str::limit(strip_tags($request->artikelPost), 120);

        Post::create($validasiData);

        return redirect('/dashboard/artikel')->with('success', 'Berhasil Menambahkan Artikel');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.artikel.detail', [
            'artikel' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.artikel.edit', [
            'artikel' => $post,
            'data' => KategoriPost::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $rules = [
            'judul' => 'required|max:255',
            'kategoripost_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ];

        // Hanya validasi slug jika slug berubah
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validasiData = $request->validate($rules);

        // Cek jika ada file gambar baru
        if ($request->file('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::delete($post->image);
            }
            // Simpan gambar baru dan masukkan ke validasi data
            $validasiData['image'] = $request->file('image')->store('artikel-image');
        }

        // Tambahkan user_id dan excerpt ke validasi data
        $validasiData['user_id'] = auth()->user()->id;
        $validasiData['excerpt'] = Str::limit(strip_tags($request->artikelPost), 120);

        // Update artikel dengan data yang telah divalidasi
        $post->update($validasiData);

        return redirect('/dashboard/artikel')->with('success', 'Berhasil Edit Artikel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        if ($post->image) {
            Storage::delete($post->image);
        }

        return redirect('/dashboard/artikel')->with('success', 'Artikel Berhasil di Hapus');
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
