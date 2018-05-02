<?php

namespace App\Http\Controllers\Customer;

use App\tb_lapangan;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomesController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth'->roles == 3);
//    }

    public function index(){
        $lap = tb_lapangan::all();
//        $view = view('customer.home')->with('lap', $lap);
//        return $this->checkRoleCustomer($view);
        return view('customer.home')->with('lap', $lap);
    }

    public function home(){
        $lap = tb_lapangan::all();
        $view = view('customer.home')->with('lap', $lap);
        return $this->checkRoleCustomer($view);
//        return view('customer.home')->with('lap', $lap);
    }

    public function show($id){
        $lap = tb_lapangan::find($id);
//        return view('customer.detail_lapangan')->with('lap', $lap);
        $lat = $lap->latitude;
        $long = $lap->longitude;
        $view = view('customer.detail_lapangan')->with(['lap'=>$lap, 'lat' =>$lat, 'long', $long]);
        return $this->checkRoleCustomer($view);
    }

    public function booking($id){
        $laps = tb_lapangan::find($id);
        $user = Auth::user();
        $view = view('customer.transaksi_1')->with(['laps'=> $laps, 'user' => $user]);
        return $this->checkRoleCustomer($view);
    }

    public function lobby(){
        return view('customer.lobby');
    }
}
