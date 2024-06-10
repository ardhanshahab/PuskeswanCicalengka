<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\hewan;

class pendaftaranController extends Controller
{
    public function index()
    {
        // $hewans = Pendaftaran::all();
        // return view('pendaftaran.index', ['hewans' => $hewans]);
        return view('pendaftaran.index');

    }

    public function getPendaftaran()
    {
         $posts = Pendaftaran::with('hewan', 'dokter')->get();

         return response()->json([
            'success' => true,
            'message' => 'List pendaftaran',
            'data' => $posts,
        ]);
    }

    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request)
    {
        // dd( $request->all());

        $request->validate([
            'nama_hewan' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_hewan' => 'required',
            'umur' => 'required',
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'riwayat_penyakit' => 'nullable',
            'tindakan' => 'nullable',
            'status' => 'nullable',
            'tanggal_pemeriksaan' => 'required',
        ]);
        $hewan = Hewan::where('nama_hewan', $request->nama_hewan)
              ->where('nama_pemilik', $request->nama_pemilik)
              ->first();

        if ($hewan) {
            // Jika data sudah ada, langsung tambahkan ke tabel pendaftaran saja
            Pendaftaran::create([
                'nama_hewan' => $request->nama_hewan,
                'nama_pemilik' => $request->nama_pemilik,
                'riwayat_penyakit' => $request->riwayat_penyakit,
                'tindakan' => 'Pemeriksaan',
                'status' => 'Proses Pemeriksaan',
            ]);
        } else {
            // Jika data belum ada, tambahkan ke tabel hewan dan pendaftaran
            Hewan::create([
                'nama_hewan' => $request->nama_hewan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jenis_hewan' => $request->jenis_hewan,
                'umur' => $request->umur,
                'nama_pemilik' => $request->nama_pemilik,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]);

            Pendaftaran::create([
                'nama_hewan' => $request->nama_hewan,
                'nama_pemilik' => $request->nama_pemilik,
                'riwayat_penyakit' => $request->riwayat_penyakit,
                'tindakan' => $request->tindakan,
                'status' => $request->status,
            ]);
        }

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Hewan berhasil ditambahkan');

    }

    public function edit($id)
    {
        $hewan = Pendaftaran::find($id);
        return view('pendaftaran.edit', compact('hewan'));
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
            'riwayat_penyakit' => 'required',
            'tindakan' => 'required',
            'status' => 'required',
        ]);

        $hewan = Pendaftaran::find($id);
        $hewan->update([
            'nama_hewan' => $request->nama_hewan,
            'nama_pemilik' => $request->nama_pemilik,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'tindakan' => $request->tindakan,
            'status' => $request->status,
        ]);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Hewan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pendaftaran::find($id)->delete();

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Hewan berhasil dihapus');
    }
}
