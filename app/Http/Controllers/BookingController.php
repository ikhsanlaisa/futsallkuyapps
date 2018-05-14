<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $booking = Booking::with(['lapangan', 'customer', 'players'])->find($id);
        // $user=Auth::user();
        // return json_encode(['booking'=>$booking]);
        return view('customer.booking_detail')->with(['booking' => $booking]);
    }

    public function joining($bookid)
    {
        $user    = Auth::user();
        $booking = Booking::with(['lapangan'])->find($bookid);
        $find    = Player::whereRaw('booking_id=? AND user_id=?', [$bookid, $user->id])->get();
        $status  = count($find) > 0 ? 1 : 0;
        return view('customer.joining_detail')->with(['booking' => $booking, 'status' => $status]);
    }

    /*
     * PLAYER CONTROLLER
     */
    public function get_all_player()
    {
        $players = Booking::with(['customer', 'players'])->get();
        return json_encode($players);
    }
    public function adding_player(Request $req, $bookid)
    {
        $booking             = Booking::find($bookid);
        $player              = new Player();
        $player->user_id     = $req->input('_userid');
        $player->booking_id  = $bookid;
        $booking->playersNum = intval($booking->playersNum) + 1;
        $booking->save();
        if ($player->save()) {
            // return json_encode(['result'=>'SUCCESS', 'player'=>$player, 'booking'=>$booking]);
            return back();
        } else {
            return json_encode(['result' => 'FAILED']);
        }
    }

}
