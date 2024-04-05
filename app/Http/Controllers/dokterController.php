<?php

namespace App\Http\Controllers;

use App\Models\dokter;
use Illuminate\Http\Request;


class dokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokters.index', ['dokters' => $dokters]);
    }

    public function create()
    {
        return view('dokters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dokter = Dokter::find($id);
        return view('dokters.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $dokter = Dokter::find($id);
        $dokter->update($request->all());

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil diperbarui');
    }

    public function destroy($id)
    {
        Dokter::find($id)->delete();

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil dihapus');
    }
}
