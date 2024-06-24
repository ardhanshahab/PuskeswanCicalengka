<?php

namespace App\Http\Controllers;

use App\Models\hewan;
use Illuminate\Http\Request;
use App\Models\antrian;
use App\Models\Schedule;
use Carbon\Carbon;

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

        $today = Carbon::today();

        // Ambil data antrian untuk hari ini saja
        $antrians = Antrian::with('pendaftaran')
            ->whereDate('created_at', $today)
            ->orderBy('nomor_antrian')
            ->get();

        // return $antrians;
        $user = auth()->user();

        $hewan = hewan::where('nama_pemilik', $user->name)->get();
        // return $user;
        // return view('antrian.index', compact('antrians'));
        if($user->role == 'admin'){
            return view('fcfs.home', compact('antrians'));
        }else{
            return view('home', compact('hewan'));
        }
    }

}
