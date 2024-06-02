<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\antrian;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $antrians = Antrian::orderBy('nomor_antrian')->get();
        // return view('antrian.index', compact('antrians'));

        return view('home', compact('antrians'));
    }
}
