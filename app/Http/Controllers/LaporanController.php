<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AntrianPengunjung;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function pengunjung()
    {
        $antrianPengungjung = AntrianPengunjung::where('status', '!=', 0)
            ->with([
                'masterKaryawan',
                'masterCabang'
                ])
            ->get();
        return view('laporan.pengunjung', ['pengunjungs' => $antrianPengungjung]);
    }
}
