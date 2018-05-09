<?php

namespace App\Http\Controllers\Customer;

use App\Booking;
use App\Payment;
use App\Http\Controllers\Controller;
use App\Lapangan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Otezz\Doku\Doku;
use Otezz\Doku\Library;

class HomesController extends Controller
{
   // public function __construct()
   // {
   //     $this->middleware('auth'->roles == 3);
   // }

    public function index()
    {
        $lap = Lapangan::all();
//        $view = view('customer.home')->with('lap', $lap);
        //        return $this->checkRoleCustomer($view);
        return view('customer.home')->with('lap', $lap);
    }

    public function home()
    {
        $lap  = Lapangan::all();
        $view = view('customer.home')->with('lap', $lap);
        return $this->checkRoleCustomer($view);
//        return view('customer.home')->with('lap', $lap);
    }

    public function show($id)
    {
        $lap = Lapangan::with('booking')->find($id);
        // return json_encode($lap);
        return view('customer.detail_lapangan')->with('lap', $lap);
        // $lat  = $lap->latitude;
        // $long = $lap->longitude;
        // $view = view('customer.detail_lapangan')->with(['lap' => $lap, 'lat' => $lat, 'long', $long]);
        // return $view;
    }

    public function booking($id)
    {
        $laps = Lapangan::find($id);
        // $user = Auth::user();
        $view = view('customer.transaksi_1')->with(['laps' => $laps]);
        // return json_encode($user);
        return $this->checkRoleCustomer($view);
    }

    public function lobby()
    {
        return view('customer.lobby');
    }

    public function mybooks()
    {
        $user    = Auth::user();
        $userid  = intval(Auth::user()->id);
        $booking = Booking::with('lapangan')->where('customer_id', $userid)->get();
        return view('customer.orders')->with(['booking' => $booking, 'user' => $user]);
        // return response()->json(['user'=>$user, 'booking'=>$booking])->withHeaders(['Content-Type'=>'application/json']);
    }

    public function topup_show()
    {
        $user    = Auth::user();
        return view('customer.topup')->with(['user'=>$user]);
    }
    public function topup_invoice_show(Request $req)
    {
        //return view('customer.topup');
        $amount = $req->topup_payment_amount;
        $method = $req->topup_payment_method;
        $invoice = rand(10000001,99999999);

        $mallId="10390046";
        Doku::$sharedKey = "PpjCAFz3A8so";
        Doku::$mallId    = $mallId;
        //$invoice         = "invoice_1458123951";
        $params          = array(
            "amount"   => $amount,
            "invoice"  => $invoice,
            "currency" => "360",
            "mallid" => $mallId,
            "channel" => $method
        );
        $words = Library::createWords($params);
        $params['words'] = $words;
        $params = (object) $params;
        $user    = Auth::user();

        return view('customer.topup_invoice')->with(['user'=>$user, 'params'=>$params]);
        //return response(['user'=>$user, 'params'=>$params]);
    }
    public function topup_order(Request $req){
        $user = Auth::user();

        $order = new Payment();
        $order->invoice_number = $req->input('TRANSIDMERCHANT');
        $order->amount = $req->input('PURCHASEAMOUNT');
        $order->lap_id = $req->input('LAP_ID');
        $order->customer_id = $user->id;
        $order->customer_name = $user->name;
        $order->customer_phone = $user->telp;
        $order->customer_email = $user->email;
        $order->customer_address = $user->email;
        $order->payment_desc = "TOP UP SERIES";
        $order->payment_channel = "0001";
        $order->payment_status = "PAID";
        $order->save();

        $userx = User::find($user->id);
        $userx->saldo=intval($user->saldo+$order->amount);
        $userx->save();

        //return response()->json(['result', Payment::where('invoice_number', $order->invoice_number)->get()]);
        return redirect('/my-booking');
    }
}
