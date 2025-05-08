<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Laporan::all();
        return view('user.laporan.index', compact('data'));
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

        if($request->hasFile('dokumentasi'))
        {
            $img = $request->file('dokumentasi'); //mengambil file gambar yang diupload
            $path = 'public/images/laporan'; //menentukan path yang akan dijadikan penyimpanan
            $ext = $img->getClientOriginalExtension(); //mengambil format file
            $nama = 'dokumentasi_laporan'.random_int(0000, 9999).Carbon::now()->format('Ymdhis').'.'.$ext; //nama ketika gambar berhasil diupload
            $img->storeAs($path, $nama); //menyimpan ke path dengan nama baru.

            $input['dokumentasi'] = $nama; //nilai yang akan disimpan di database
        }

        Laporan::create($input);
        return redirect()->route('user.laporan.index')->with('success','Laporan berhasil diajukan');
    }

    public function detail($param)
    {
        $data = Laporan::findOrFail($param);
        return view('user.laporan.detail', compact('data'));
    }

    public function edit($param)
    {
        $data = Laporan::findOrFail($param);
        return view('user.laporan.edit', compact('data'));
    }

    public function update(Request $request, $param)
    {
        $input = $request->all();
        $data = Laporan::findOrFail($param);

        $request->validate([
            'judul_laporan' => 'required|string|min:3|max:100',
            'dokumentasi' => 'file|max:10240',
            'detail_laporan' => 'required'
        ]);

        // input untuk nilai id_user
        $input['id_user'] = Auth::user()->id; //mengambil id user yang sedang login.
        if($request->hasFile('dokumentasi'))
        {
            $img = $request->file('dokumentasi'); //mengambil file gambar yang diupload
            $path = 'public/images/laporan'; //menentukan path yang akan dijadikan penyimpanan
            $ext = $img->getClientOriginalExtension(); //mengambil format file
            $nama = 'dokumentasi_laporan'.random_int(0000, 9999).Carbon::now()->format('Ymdhis').'.'.$ext; //nama ketika gambar berhasil diupload
            $img->storeAs($path, $nama); //menyimpan ke path dengan nama baru.

            $input['dokumentasi'] = $nama; //nilai yang akan disimpan di database

            // menghapus file yang diedit atau dihapus
            Storage::delete('public/images/laporan/'.$data->dokumentasi);
        }

        $data->update($input);
        
        return redirect()->route('user.laporan.detail', $param)->with('success','Laporan berhasil diubah');
    }
}
