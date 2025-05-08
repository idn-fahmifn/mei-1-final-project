<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Respon;
use Illuminate\Http\Request;

class ResponController extends Controller
{
    public function index()
    {
        $data = Laporan::all(); //mengambil data sesuai authentikasi
        return view('respon.index', compact('data'));
    }

    public function detail($param)
    {
        $data = Laporan::findOrFail($param);
        $respon = Respon::where('id_laporan', $param)->get()->all();
        return view('respon.detail', compact('data', 'respon'));
    }

    public function respon($param)
    {
        $data = Laporan::findOrFail($param);
        return view('respon.create', compact('data'));
    }

    public function store(Request $request, $param)
    {
        $request->validate([
            'detail_respon' => 'required' //validasi untuk form detail respon
        ]);

        Respon::create([
            'id_laporan' => $param, //mengambil nilai untuk column id laporan dari parameter
            'detail_respon' => $request->detail_respon // mengambil nilai dari request detail respon (form)
        ]);

        // jika ada sebuah perubahan untuk status
        $status = Laporan::findOrFail($param); //mencari data yang akan diganti berdasarkan parameter yang dipilih
        $status->status = $request->status; //menyimpan perubahan yang diambil dari form input.
        $status->save(); //perintah untuk menyimpan

        return redirect()->route('admin.laporan.detail', $param);

    }

}
