<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        return view('user.laporan.index');
    }
    public function create()
    {
        return view('user.laporan.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'judul_laporan' => 'required|string|min:3|max:100',
            'dokumentasi' => 'required|file|max:10240',
            'detail_laporan' => 'required'
        ]);

        // input untuk nilai id_user
        $input['id_user'] = Auth::user()->id; //mengambil id user yang sedang login.

        if($request->hasFile('dokumentasu'))
        {
            $img = $request->file('dokumentasi'); //mengambil file gambar yang diupload
            $path = 'public/images/laporan'; //menentukan path yang akan dijadikan penyimpanan
            $ext = $img->getClientOriginalExtension(); //mengambil format file
            $nama = 'dokumentasi_laporan'.Carbon::now()->format('Ymdhis').'.'.$ext; //nama ketika gambar berhasil diupload
            $img->storeAs($path, $nama); //menyimpan ke path dengan nama baru.
        }


    }
}
