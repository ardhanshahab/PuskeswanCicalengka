<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class landingpageController extends Controller
{
    public function welcome()
    {
        $schedules = Schedule::all();
        // return view('antrian.index', compact('antrians'));

        return view('welcome', compact('schedules'));
    }
    public function pembayaran()
    {
        return view('pembayaran.index');
    }

}
