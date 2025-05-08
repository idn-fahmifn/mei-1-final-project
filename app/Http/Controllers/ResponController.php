<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
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
}
