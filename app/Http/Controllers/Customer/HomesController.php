<?php

namespace App\Http\Controllers\Customer;

use App\tb_lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomesController extends Controller
{
    public function index(){
        $lap = tb_lapangan::all();

        return view('customer.home')->with('lap', $lap);
    }

    public function show($id){
        $lap = tb_lapangan::find($id);
        return view('customer.detail_lapangan')->with('lap', $lap);
    }
}
