<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;


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
}
