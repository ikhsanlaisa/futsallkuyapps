<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Lapangan;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LobbyController extends Controller
{
    public function index(){
    	$booking=Booking::with('lapangan')->get();
    	$booking = $booking->sortBy('jadwal');
    	// return json_encode(['booking'=>$booking]);
    	return view('customer.lobby')->with(['booking'=>$booking]);
    }

    public function random(){
        return view('customer.random');
    }

    public function rawRandom(){
    	$booking = Booking::with(['lapangan', 'players'])->get();
    	$count = count($booking);
    	$result = (object)[];
    	$result->size=$count;
    	$result->item = $booking[rand(0,$count-1)];
    	$find    = Player::whereRaw('booking_id=? AND user_id=?', [$result->item->id, Auth::user()->id])->get();
        $status  = count($find) > 0 ? 1 : 0;
    	$result->items = $booking;
    	$result->status = $status;
    	// return response()->json($result);
    	return view('content_joining')->with(['booking'=>$result->item, 'status'=>$status]);
    }
}

?>