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
        return view('respon.detail', compact('data'));
    }

    public function respon($param)
    {
        $data = Laporan::findOrFail($param);
        return view('respon.create', compact('data'));
    }

    public function store(Request $request, $param)
    {
        $request->validate([
            'detail_respon' => 'required'
        ]);

        Respon::create([
            'id_laporan' => $param,
            'detail_respon' => $request->detail_respon
        ]);

        $status = Laporan::findOrFail($param);
        $status->status = $request->status;
        $status->save();

        return redirect()->route('admin.laporan.detail', $param);

    }

}
