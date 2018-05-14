<?php
namespace App\Http\Controllers\Customer;
use App\Booking;
use App\Payment;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user=Auth::user();
        return view('customer.profile.my')->with(['tabnav'=>0, 'user' => $user]);
    }
    // public function edit(){}
    public function index_booking(){
    	$user=Auth::user();
    	$userid  = intval(Auth::user()->id);
        $booking = Booking::with('lapangan')->where('customer_id', $userid)->get();
        // return view('customer.orders')->with(['tabnav'=>2, 'booking' => $booking, 'user' => $user]);
        return view('customer.profile.booking')->with(['tabnav'=>2, 'user' => $user]);
    }
    public function index_topup(){
        $user=Auth::user();
        return view('customer.profile.topup')->with(['tabnav'=>3, 'user' => $user]);
    }
    public function index_team(){
        $user=Auth::user();
        return view('customer.profile.team')->with(['tabnav'=>1, 'user' => $user]);
    }
}

?>