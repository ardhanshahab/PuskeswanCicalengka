<?php

namespace App\Http\Controllers;

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
        $startOfWeek = Carbon::now()->startOfWeek(); // Minggu ini dimulai dari hari Senin
        $endOfWeek = Carbon::now()->endOfWeek(); // Minggu ini berakhir pada hari Minggu

        // $orders = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        $antrians = Antrian::with('pendaftaran')->orderBy('nomor_antrian')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        // return $antrians;
        // return view('antrian.index', compact('antrians'));

        return view('home', compact('antrians'));
    }

}
