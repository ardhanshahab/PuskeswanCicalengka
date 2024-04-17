<?php

namespace App\Http\Controllers;

use App\Models\dokter;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\PostResource;

class dokterController extends Controller
{
    public function index()
    {

        return view('dokters.index');
    }

    public function create()
    {
        $users = User::where('role', 'dokter')
             ->where('status_dokter', '0')
             ->get();

        // return view('dokter.create', ['users' => $users]);
        return view('dokters.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $status = '0';

        Dokter::create([
            'user_id' => $request->user_id,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'status_kerja' => $status
        ]);

        // Update status_dokter pada tabel users
        User::where('id', $request->user_id)->update(['status_dokter' => $status]);

        return redirect()->route('dokter.index')->with('success','Data berhasil disimpan');
            // ->with('success', 'Dokter berhasil ditambahkan');
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

    public function getDokter()
    {
        $dokters = Dokter::with('user')->get();
        return new PostResource(true, 'List Data Posts', $dokters);
    }

}

