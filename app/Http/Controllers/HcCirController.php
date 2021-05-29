<?php

namespace App\Http\Controllers;

use App\Models\HcCir;
use App\Models\HcCuti;
use App\Models\HcResign;
use Illuminate\Http\Request;
use App\Models\MasterJabatan;
use App\Models\HcResignCeklis;
use App\Models\MasterKaryawan;
use App\Models\HcResignSurveiCeklis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class HcCirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cirs = HcCuti::get();

        return view('cir.index', ['cirs' => $cirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawans = MasterKaryawan::get();
        $jabatans = MasterJabatan::get();
        
        return view('cir.create', ['karyawans' => $karyawans, 'jabatans' => $jabatans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->jenis == "cuti") {
            # code...
            $cutis = new HcCuti;
            $cutis->master_karyawan_id = $request->master_karyawan_id;
            $cutis->master_jabatan_id = $request->master_jabatan_id;
            $cutis->atasan = $request->atasan;
            $cutis->telepon = $request->cuti_telepon;
            $cutis->alamat = $request->cuti_alamat;
            $cutis->jenis = $request->cuti_jenis;
            $cutis->tanggal_mulai = $request->cuti_tanggal_mulai;
            $cutis->tanggal_berakhir = $request->cuti_tanggal_berakhir;
            $cutis->karyawan_pengganti = $request->cuti_pengganti;
            $cutis->alasan = $request->cuti_alasan;
            $cutis->tanggal_kerja = $request->cuti_tanggal_kerja;
            $cutis->save();
        } else {
            $resign = new HcResign;
            $resign_ceklis = new HcResignCeklis;
            $resign_survei_ceklis = new HcResignSurveiCeklis;
        }

        return redirect()->route('cir.index')->with('status', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuti = HcCuti::with(['masterKaryawan', 'atasanLangsung', 'masterJabatan'])->find($id);
        $karyawan = MasterKaryawan::where('id', $cuti->atasan)->first();
        $karyawanPengganti = MasterKaryawan::where('id', $cuti->karyawan_pengganti)->first();

        return view('cir.detail', ['cuti' => $cuti, 'karyawan' => $karyawan, 'karyawanPengganti' => $karyawanPengganti]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request, $id)
    {
        $cir = HcCuti::find($id);
        $cir->delete();

        return redirect()->route('cir.index')->with('status', 'Data berhasil dihapus');
    }

    public function atasanApprove($id)
    {
        $cuti = HcCuti::find($id);
        $cuti->status = 2;
        $cuti->save();

        return redirect()->route('cir.index')->with('status', 'Cuti Di Approve');
    }

    public function atasanTolak($id)
    {
        $cuti = HcCuti::find($id);
        $cuti->status = 3;
        $cuti->save();

        return redirect()->route('cir.index')->with('status', 'Cuti Di Tolak');
    }

    public function hcApprove($id)
    {
        $cuti = HcCuti::find($id);
        $cuti->status = 4;
        $cuti->save();

        return redirect()->route('cir.index')->with('status', 'Cuti Di Approve');
    }

    public function hcTolak($id)
    {
        $cuti = HcCuti::find($id);
        $cuti->status = 5;
        $cuti->save();

        return redirect()->route('cir.index')->with('status', 'Cuti Di Tolak');
    }
    public function indexCuti()
    {
        $cutis = HcCuti::where('master_karyawan_id', Auth::user()->master_karyawan_id)->get();

        return view('cuti.index', ['cutis' => $cutis]);
    }

    public function createCuti()
    {
        $karyawans = MasterKaryawan::get();
        $jabatans = MasterJabatan::get();

        return view('cuti.create', ['karyawans' => $karyawans, 'jabatans' => $jabatans]);
    }

    public function storeCuti(Request $request)
    {
        $cutis = new HcCuti;
        $cutis->master_karyawan_id = $request->master_karyawan_id;
        $cutis->master_jabatan_id = $request->master_jabatan_id;
        $cutis->atasan = $request->atasan;
        $cutis->telepon = $request->cuti_telepon;
        $cutis->alamat = $request->cuti_alamat;
        $cutis->jenis = $request->cuti_jenis;
        $cutis->tanggal_mulai = $request->cuti_tanggal_mulai;
        $cutis->tanggal_berakhir = $request->cuti_tanggal_berakhir;
        $cutis->karyawan_pengganti = $request->cuti_pengganti;
        $cutis->alasan = $request->cuti_alasan;
        $cutis->tanggal_kerja = $request->cuti_tanggal_kerja;
        $cutis->tanggal = Date('yyyy-mm-dd');
        $cutis->status = 1;
        $cutis->save();

        return redirect()->route('cir.index_cuti')->with('status', 'Data berhasil disimpan');
    }

    public function indexResign()
    {

    }

    public function createResign()
    {

    }

    public function storeResign()
    {
        
    }
}
