<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
