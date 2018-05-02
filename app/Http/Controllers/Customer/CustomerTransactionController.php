<?php

namespace App\Http\Controllers\Customer;

use App\tb_booking;
use App\tb_lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $day = $request->input('days');
        $hour = $request->input('hours');
        $laps = $request->input('laps');
        $lapps = $request->input('price');
        $status1 = "ready";
        $status2 = "waiting";

        $code = rand(10000000,99999999);

        $booking = new tb_booking();
        $booking->lap_id = $laps;
        $booking->customer_id = Auth::user()->id;
        $booking->jadwal_book = $day . " " . $hour;
        $booking->cost_perhour = $lapps;
        $booking->code = $code;
        $booking->player_model = $request->input('player');
//        var_dump($request->input('player') == "fullteam");
        if ($request->input('player') == "fullteam") {
            $booking->status = $status1;
        }else{
            $booking->status = $status2;
        }
        $result = $booking->save();
        if ($result){
            return redirect('/booking/'.$code);
        }else{
            return redirect('/home');
        }
    }

    public function show($code){
        $booking = tb_booking::where('code', $code)->first();
        $view = view('customer.transaksi_2');
        return $this->checkRoleCustomer($view)->with('booking', $booking);
    }
}
