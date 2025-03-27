<?php

namespace App\Http\Controllers;

use App\Models\SuratResi;
use App\Http\Requests\StoreSuratResiRequest;
use App\Http\Requests\UpdateSuratResiRequest;
use Illuminate\Http\Request;


class SuratResiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.surat-resi.index', [
            'suratResis' => SuratResi::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.surat-resi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required|string',
            'telepon_penerima' => 'required|numeric',
            'alamat_penerima' => 'required|string',
            'nama_pengirim' => 'required|string',
            'telepon_pengirim' => 'required|numeric',
            'alamat_pengirim' => 'required|string',
            'tanggal_pengiriman' => 'required|date',
        ]);

        SuratResi::create($request->all());

        return redirect()->route('surat-resi.index')->with('success', 'Data berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(SuratResi $suratResi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suratResi = SuratResi::findOrFail($id);
        return view('dashboard.surat-resi.edit', compact('suratResi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penerima' => 'required|string',
            'telepon_penerima' => 'required|numeric',
            'alamat_penerima' => 'required|string',
            'nama_pengirim' => 'required|string',
            'telepon_pengirim' => 'required|numeric',
            'alamat_pengirim' => 'required|string',
            'tanggal_pengiriman' => 'required|date',
        ]);

        $suratResi = SuratResi::findOrFail($id);
        $suratResi->update($request->all());

        return redirect()->route('surat-resi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $suratResi = SuratResi::findOrFail($id);
        $suratResi->delete();

        return redirect()->route('surat-resi.index')->with('success', 'Data berhasil dihapus!');
    }
}
