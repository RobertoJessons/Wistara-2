<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = laporan::all();
        return view('laporan.index', compact('laporan'));
    }
}
