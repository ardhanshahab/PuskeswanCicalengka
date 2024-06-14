<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Hewan;
use App\Models\Pendaftaran;
use App\Models\Dokter;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AntrianController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        $antrians = Antrian::orderBy('nomor_antrian')->get();
        return view('antrian.index', compact('antrians'));
    }

    public function create()
    {
        return view('antrian.create');
    }

    public function store(Request $request)
    {
        $pasien = Hewan::where('nama_hewan', $request->nama_hewan)
            ->where('nama_pemilik', $request->nama_pemilik)
            ->first();

        if (!$pasien) {
            Hewan::create([
                'nama_hewan' => $request->nama_hewan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jenis_hewan' => $request->jenis_hewan,
                'umur' => $request->umur,
                'nama_pemilik' => $request->nama_pemilik,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]);
        }

        $dokter = Dokter::where('status_kerja', 'aktif')->inRandomOrder()->first();

        if (!$dokter) {
            return back()->withErrors(['error' => 'Tidak ada dokter yang tersedia']);
        }

        $pendaftaran = Pendaftaran::create([
            'nama_hewan' => $request->nama_hewan,
            'nama_pemilik' => $request->nama_pemilik,
            'nama_dokter' => $dokter->nama_dokter,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'tindakan' => 'Pemeriksaan',
            'status' => 'Proses Pemeriksaan',
            'tanggal_pendaftaran' => Carbon::now()->setTimezone('Asia/Jakarta')->locale('id'),
        ]);

        $lastAntrian = Antrian::orderBy('nomor_antrian', 'desc')->first();
        $nomorAntrian = $lastAntrian ? $lastAntrian->nomor_antrian + 1 : 1;
        $antrian = new Antrian();
        $antrian->nama_hewan = $request->nama_hewan;
        $antrian->nomor_antrian = $nomorAntrian;
        $antrian->waktu_datang = Carbon::now()->locale('id');
        $antrian->pendaftaran_id = $pendaftaran->id;
        $antrian->save();
        $antrian->nama_pemilik = $request->nama_pemilik;
        $antrian->perkiraan_pemeriksaan = Carbon::now()->addMinutes(30)->locale('id');
        $antrian->riwayat_penyakit = $request->riwayat_penyakit;

        // Format tanggal ke Indonesia
        $waktu_datang_formatted = Carbon::parse($antrian->waktu_datang)->translatedFormat('l, d F Y H:i');
        $perkiraan_pemeriksaan_formatted = Carbon::parse($antrian->perkiraan_pemeriksaan)->translatedFormat('l, d F Y H:i');

        // Generate PDF antrian
        $pdf = Pdf::loadView('antrian.pdf', ['antrian' => $antrian, 'waktu_datang' => $waktu_datang_formatted, 'perkiraan_pemeriksaan' => $perkiraan_pemeriksaan_formatted]);

        // Return the generated PDF for download
        return $pdf->stream('antrian.pdf');
    }

    public function show($id)
    {
        $antrian = Antrian::findOrFail($id);
        return view('antrian.show', compact('antrian'));
    }

    public function startExamination($id)
    {
        $antrian = Antrian::with('pendaftaran')->findOrFail($id);
        $antrian->waktu_periksa = Carbon::now()->locale('id');
        $antrian->save();

        // Update the status of the related Pendaftaran record
        $pendaftaran = Pendaftaran::where('id', $antrian->pendaftaran_id)->first();

        if ($pendaftaran) {
            $pendaftaran->status = 'Sedang dalam Pemeriksaan';
            $pendaftaran->tanggal_pemeriksaan = Carbon::now()->locale('id');
            $pendaftaran->save();
        }

        return redirect()->route('home');
    }

    public function finishExamination($id)
    {
        $antrian = Antrian::with('pendaftaran')->findOrFail($id);
        $antrian->waktu_selesai = Carbon::now()->locale('id');
        $antrian->save();

        // Update the status of the related Pendaftaran record
        $pendaftaran = Pendaftaran::where('id', $antrian->pendaftaran_id)->first();

        if ($pendaftaran) {
            $pendaftaran->status = 'Pembayaran';
            $pendaftaran->save();
        }

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->delete();
        return redirect()->route('home');
    }
}
