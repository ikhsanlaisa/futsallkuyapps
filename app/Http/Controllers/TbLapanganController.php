<?php

namespace App\Http\Controllers;

use App\tb_lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TbLapanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function data_lapangan()
    {
        $lap = tb_lapangan::where('store_id', Auth::user()->lap()->first()->id)->get();
        return view('admin.data_lapangan')->with('lap', $lap);
    }

    public function tambah_lapangan()
    {
        return view('admin.tambah_lapangan');
    }

    public function store(Request $request)
    {
        $filepath = 'images/lapangan/';

        $field = $request->file('foto');
        $fields = $field->getClientOriginalName();
        $field->move($filepath, $fields);

//        $user = Auth::user()->id;
//        if ($user) {
            $lap = new tb_lapangan();
            $lap->name = $request->input('name');
            $lap->price = $request->input('price');
            $lap->foto = $fields;
            $lap->store_id = Auth::user()->id;
            $result = $lap->save();

            if ($result){
                return redirect('/tambah_lapangan')->with(['message' => 'Berhasil tambah data lapangan']);
            }else{
                return redirect('/tambah_lapangan')->with(['message' => 'Gagal tambah data lapangan']);
            }
//        }
    }

    public function show($id){
        $lap = tb_lapangan::find($id);
        return json_encode($lap);
    }
}
