<?php

namespace App\Http\Controllers\Customer;

//use App\tb_booking;
use App\Booking;
use App\Payment;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $jadwal     = $request->input('jadwal');
        $laps    = $request->input('laps');
        $lapps   = $request->input('price');
        $status1 = "ready";
        $status2 = "waiting";

        $code = rand(10000000, 99999999);

        $booking              = new Booking();
        $booking->lap_id      = $laps;
        $booking->customer_id = Auth::user()->id;
        $booking->jadwal      = $jadwal;
        $booking->tarif       = $lapps;
        $booking->tariftotal  = $lapps;
        $booking->tariftype   = "h";
        $booking->id          = $code;
        $booking->playermodel = $request->input('player');
//        var_dump($request->input('player') == "fullteam");
        if ($request->input('player') == "fullteam") {
            $booking->status = $status1;
        } else {
            $booking->status = $status2;
        }
        $result = $booking->save();
        if ($result) {
            return redirect('/book/'.$code.'/created/');
        } else {
            return redirect('/home');
        }
    }

    public function show($code)
    {
        $booking = Booking::where('id', $code)->first();
        $view    = view('customer.transaksi_2');
        return $this->checkRoleCustomer($view)->with('booking', $booking);
    }

    public function book_show($code){
        $user = Auth::user();
        $booking = Booking::with('customer')->find($code);
        return view('customer.orders_booked')->with(['booking'=>$booking, 'user'=>$user]);
        // return response()->json(['booking'=>$booking, 'user'=>$user]);
    }

     public function pay_booking($code){
        $user = Auth::user();
        $booking = Payment::where('invoce_number', $code);
        // return view('customer.orders_booked')->with(['booking'=>$booking, 'user'=>$user]);
        $userx = User::find($booking->customer_id);
        $userx->saldo = intval($user->saldo - $booking->total);
        $userx->save();

        return response()->json(['user'=>$book]);
        // return response()->json();
    }
    
}
