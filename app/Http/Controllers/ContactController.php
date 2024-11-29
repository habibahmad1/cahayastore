<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Data untuk email
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Kirim email
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('cadangmaky@gmail.com') // Ganti dengan email penerima
                    ->subject('Pesan dari ' . $data['name']);
        });

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
