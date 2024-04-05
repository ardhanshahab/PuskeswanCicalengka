<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hewan;

class hewanController extends Controller
{
    public function index()
    {
        $hewans = Hewan::all();
        return view('hewans.index', ['hewans' => $hewans]);
    }

    public function create()
    {
        return view('hewans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'umur' => 'required',
            'pemilik' => 'required',
            'alamat_pemilik' => 'required',
            'no_telp_pemilik' => 'required',
            'tgl_pendaftaran' => 'required',
        ]);

        Hewan::create($request->all());

        return redirect()->route('hewans.index')
            ->with('success', 'Hewan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $hewan = Hewan::find($id);
        return view('hewans.edit', compact('hewan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'umur' => 'required',
            'pemilik' => 'required',
            'alamat_pemilik' => 'required',
            'no_telp_pemilik' => 'required',
            'tgl_pendaftaran' => 'required',
        ]);

        $hewan = Hewan::find($id);
        $hewan->update($request->all());

        return redirect()->route('hewans.index')
            ->with('success', 'Hewan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Hewan::find($id)->delete();

        return redirect()->route('hewans.index')
            ->with('success', 'Hewan berhasil dihapus');
    }
}
