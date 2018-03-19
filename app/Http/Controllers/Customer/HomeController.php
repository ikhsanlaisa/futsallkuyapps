<?php

namespace App\Http\Controllers\Customer;

use App\tb_lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $lap = tb_lapangan::find('store_id');
        return view('customer.CustomerHome')->with('lap', $lap);
    }
}
