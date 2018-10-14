<?php

namespace App\Http\Controllers;

use App\tb_jadwal;
use Illuminate\Http\Request;

class TbJadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $jadwal = tb_jadwal::where('lapangan_id');
        return view('admin.data_jadwal')->with('jadwal', $jadwal);


    }
}
