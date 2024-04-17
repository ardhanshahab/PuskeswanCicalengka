<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hewan;

class hewanController extends Controller
{
    public function index()
    {
        $hewans = Hewan::all();
        return view('hewan.index', ['hewans' => $hewans]);
    }

    public function create()
    {
        return view('hewan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hewan' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_hewan' => 'required',
            'umur' => 'required',
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
        // dd($request->validate());
        Hewan::create([
            'nama_hewan' => $request->nama_hewan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_hewan' => $request->jenis_hewan,
            'umur' => $request->umur,
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,

        ]);

        return redirect()->route('hewan.index')
            ->with('success', 'Hewan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $hewan = Hewan::find($id);
        return view('hewan.edit', compact('hewan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_hewan' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_hewan' => 'required',
            'umur' => 'required',
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $hewan = Hewan::find($id);
        $hewan->update($request->all());

        return redirect()->route('hewan.index')
            ->with('success', 'Hewan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Hewan::find($id)->delete();

        return redirect()->route('hewan.index')
            ->with('success', 'Hewan berhasil dihapus');
    }
}
