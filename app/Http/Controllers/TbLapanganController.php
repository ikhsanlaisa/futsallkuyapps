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
        $lap = tb_lapangan::where('store_id', Auth::user()->id)->get();
//        var_dump($lap);
        $view = view('admin.data_lapangan')->with('lap', $lap);
        return $this->checkRoleUsaha($view);
    }

    public function tambah_lapangan()
    {
        $view = view('admin.tambah_lapangan');
        return $this->checkRoleUsaha($view);
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
        $laps = tb_lapangan::find($id);
        return json_encode($laps);
    }

    public function update(Request $request, $id){
        $lap = tb_lapangan::find($id);

        $filepath = 'images/lapangan/';
        if ($request->input('foto')){
            $field = $request->input('foto');

            $fields = $field->getClientOriginalName();
            $field->move($filepath, $fields);
            $lap->foto = $fields;
        }
        if ($request->input('nama')){
        $lap->name = $request->input('nama');
        }
        if ($request->input('price')){
        $lap->price = $request->input('price');
        }
        $result = $lap->save();
        if ($result){
            return redirect('/data_lapangan')->with(['message' => 'Berhasil update data lapangan']);
        }else{
            return redirect('/data_lapangan')->with(['message' => 'Gagal update data lapangan']);
        }
    }

    public function destroy($id){
        $lap = tb_lapangan::find($id);
        $result = $lap->delete();
        if ($result){
            return redirect('/data_lapangan')->with(['message' => 'Berhasil hapus data lapangan']);
        }else{
            return redirect('/data_lapangan')->with(['message' => 'Gagal hapus data lapangan']);
        }
    }
}
