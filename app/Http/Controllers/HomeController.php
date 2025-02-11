<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;    
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function simpan(Request $request){
        $simpan = new Kegiatan();
        $simpan->hari = $request->hari;
        $simpan->tanggal = $request->tanggal;
        $simpan->kegiatan = $request->kegiatan;
        $simpan->status = $request->status;
        $simpan->save();
        Alert::success('Sukses', 'Berhasil Menambahkan Kegiatan');
        return redirect()->back();
    }
    public function ubahStatus($idkegiatan, $status){
        $ubahdata = Kegiatan::find($idkegiatan);
        $ubahdata->status = $status;
        $ubahdata->save();
        Alert::success('Sukses','Berhasil mengubah data');
        return redirect()->back();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function hapus($id){
        Kegiatan::find($id)->delete();
        Alert::success('Sukses','Berhasil Menghapus data');
        return redirect()->back();
    }
    public function index()
    {
        return view('home')->with([
            'datas' => Kegiatan::all()
        ]);
    }
}
