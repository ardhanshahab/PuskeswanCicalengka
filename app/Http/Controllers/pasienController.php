<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pasien.index');
    }

    public function getPasien()
    {
         $posts = pasien::get();

         return response()->json([
            'success' => true,
            'message' => 'List pasien',
            'data' => $posts,
        ]);
    }

    public function create(): View
    {
        return view('pasien.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_pasien'     => 'required|min:1',
            'jenis_kelamin'     => 'required|min:1',
            'umur'     => 'required|min:1',
            'nama_pemilik'     => 'required|min:1',
            'alamat'     => 'required|min:1',
            'riwayat_penyakit'     => 'required|min:1',
        ]);

        pasien::create([
            'nama_dokter'     => $request->nama_dokter,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'umur'     => $request->umur,
            'nama_pemilik'     => $request->nama_pemilik,
            'alamat'     => $request->alamat,
            'riwayat_penyakit'     => $request->riwayat_penyakit,
        ]);

        return redirect()->route('pasien.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = pasien::findOrFail($id);

        //render view with post
        return view('pasien.show', compact('post'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = pasien::findOrFail($id);

        //render view with post
        return view('pasien.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pasien'     => 'required|min:1',
            'jenis_kelamin'     => 'required|min:1',
            'umur'     => 'required|min:1',
            'nama_pemilik'     => 'required|min:1',
            'alamat'     => 'required|min:1',
            'riwayat_penyakit'     => 'required|min:1',
        ]);

        $post = pasien::findOrFail($id);

            $post->update([
                'nama_dokter'     => $request->nama_dokter,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'umur'     => $request->umur,
                'nama_pemilik'     => $request->nama_pemilik,
                'alamat'     => $request->alamat,
                'riwayat_penyakit'     => $request->riwayat_penyakit,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil diupdate',
                'data' => $post,
            ]);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = pasien::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('pasien.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
