<?php

namespace App\Http\Controllers;

use App\Models\dokter;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class dokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dokter.index');
    }

    public function getDokter()
    {
         $posts = dokter::get();

         return response()->json([
            'success' => true,
            'message' => 'List dokter',
            'data' => $posts,
        ]);
    }

    public function create(): View
    {
        return view('dokter.create');
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
            'nama_dokter'     => 'required|min:1',
            'nip'     => 'required|min:1',
            'jenis_kelamin'     => 'required|min:1',
            'alamat'     => 'required|min:1',
        ]);

        dokter::create([
            'nama_dokter'     => $request->nama_dokter,
            'nip'     => $request->nip,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'alamat'     => $request->alamat,
        ]);

        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $post = dokter::findOrFail($id);

        //render view with post
        return view('dokter.show', compact('post'));
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
        $post = dokter::findOrFail($id);

        //render view with post
        return view('dokter.edit', compact('post'));
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
            'nama_dokter'     => 'required|min:1',
            'nip'     => 'required|min:1',
            'jenis_kelamin'     => 'required|min:1',
            'alamat'     => 'required|min:1',
        ]);

        $post = dokter::findOrFail($id);

            $post->update([
                'nama_dokter'     => $request->nama_dokter,
                'nip'     => $request->nip,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'alamat'     => $request->alamat,
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
        $post = dokter::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
