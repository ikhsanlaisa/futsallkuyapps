<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkRoleAdmin($view)
    {
        if (Auth::user()->roles == 1) {
            return ($view);
        } else {
            return redirect('/login');
        }
    }

    public function checkRoleUsaha($view)
    {
        if (Auth::user()->roles == 2) {
            return ($view);
        } else {
            return redirect('/login');
        }
    }

    public function checkRoleCustomer($view)
    {
        if (Auth::user()->roles == 3) {
            return ($view);
        } else {
            return redirect('/login');
        }
    }
}
