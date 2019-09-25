<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// menambahkan DB & Auth
use DB;
use Auth;

class KasirController extends Controller
{
    public function datKasir(){
        // $tambah
        $kasir = DB::table("kasir")->get();
        return view('admin.kasir', compact("kasir") );

    }

    public function create(Request $req){
        $query = DB::table("kasir")->insert([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'peminjaman' => $req->peminjaman,
            'bunga' => $req->bunga,
            'user_id' => Auth::user()->id
        ]);
        return back()->with("info", "Posting Success");
    }
    public function update(Request $req, $id){
        $query = DB::table("kasir")->where("id", $id)->update([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'peminjaman' => $req->peminjaman,
            'bunga' => $req->bunga,
            'user_id' => Auth::user()->id
        ]);
        return back()->with("info", "Posting Success");
    }
    public function delete($id)
    {
    $query = DB::table("kasir")->where("id", $id)->delete();
    return back()->with("info", 'data berhasil dihapus');

    }

}
