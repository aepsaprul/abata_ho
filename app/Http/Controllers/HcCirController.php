<?php

namespace App\Http\Controllers;

use App\Models\HcCir;
use App\Models\HcCuti;
use App\Models\HcResign;
use App\Models\HcCutiTgl;
use Illuminate\Http\Request;
use App\Models\MasterJabatan;
use App\Models\HcResignCeklis;
use App\Models\MasterKaryawan;
use App\Models\HcResignSurveiEssay;
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
        $cuti_tgls = HcCutiTgl::where('hc_cuti_id', $cuti->id)->get();

        return view('cir.detail', ['cuti' => $cuti, 'karyawan' => $karyawan, 'karyawanPengganti' => $karyawanPengganti, 'cuti_tgls' => $cuti_tgls]);
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
        $nama_karyawan = MasterKaryawan::find(Auth::user()->master_karyawan_id);
        $karyawans = MasterKaryawan::get();
        $jabatans = MasterJabatan::get();

        return view('cuti.create', ['nama_karyawan' => $nama_karyawan, 'karyawans' => $karyawans, 'jabatans' => $jabatans]);
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

        foreach ($request->cuti_tanggal as $key => $value) {
            # code...
            $cuti_tgl = new HcCutiTgl;
            $cuti_tgl->hc_cuti_id = $cutis->id;
            $cuti_tgl->tanggal = $value;
            $cuti_tgl->save();
        }

        return redirect()->route('cir.index_cuti')->with('status', 'Data berhasil disimpan');
    }

    public function indexResign()
    {
        $resigns = HcResign::where('master_karyawan_id', Auth::user()->master_karyawan_id)->get();

        return view('resign.index', ['resigns' => $resigns]);
    }

    public function createResign()
    {
        $nama_karyawan = MasterKaryawan::find(Auth::user()->master_karyawan_id);
        $karyawans = MasterKaryawan::get();
        $jabatans = MasterJabatan::get();

        return view('resign.create', ['nama_karyawan' => $nama_karyawan,'karyawans' => $karyawans, 'jabatans' => $jabatans]);
    }

    public function storeResign(Request $request)
    {
        // dd($request);
        $resigns = new HcResign;
        $resigns->master_karyawan_id = $request->master_karyawan_id;
        $resigns->master_jabatan_id = $request->master_jabatan_id;
        $resigns->atasan = $request->atasan;
        $resigns->lokasi_kerja = $request->lokasi_kerja;
        $resigns->tanggal_masuk = $request->tanggal_masuk;
        $resigns->tanggal_keluar = $request->tanggal_keluar;
        $resigns->alamat = $request->alamat;
        $resigns->telepon = $request->telepon;
        $resigns->status = 1;
        $resigns->save();

        if ($request->resign_ceklis_lain == "tidak") {
            $ceklis_lain = "tidak";
        } else {
            $ceklis_lain = $request->resign_ceklis_lain;
        }
        

        $data_ceklis = [
            $request->resign_ceklis_kewajiban_keuangan,
            $request->resign_ceklis_serah_terima,
            $request->resign_ceklis_id_card,
            $request->resign_ceklis_seragam_karyawan,
            $request->resign_ceklis_laptop,
            $request->resign_ceklis_peralatan_kantor,
            $request->resign_ceklis_penghapusan_akun,
            $request->resign_ceklis_penghapusan_chat,
            $request->resign_ceklis_penutupan_rekening,
            $ceklis_lain,
        ];

        foreach ($request->resign_ceklis as $key => $value) {
            # code...
            $resign_ceklis = new HcResignCeklis;
            $resign_ceklis->master_karyawan_id = $request->master_karyawan_id;
            $resign_ceklis->nama_ceklis = $value;
            $resign_ceklis->keterangan = $data_ceklis[$key];
            $resign_ceklis->tanggal_selesai = $request->resign_ceklis_tanggal[$key];
            $resign_ceklis->save();
        }

        $data_survei_ceklis = [
            $request->resign_survei_ceklis_keterangan_1,
            $request->resign_survei_ceklis_keterangan_2,
            $request->resign_survei_ceklis_keterangan_3,
            $request->resign_survei_ceklis_keterangan_4,
            $request->resign_survei_ceklis_keterangan_5,
            $request->resign_survei_ceklis_keterangan_6,
            $request->resign_survei_ceklis_keterangan_7,
            $request->resign_survei_ceklis_keterangan_8,
            $request->resign_survei_ceklis_keterangan_9,
            $request->resign_survei_ceklis_keterangan_10,
            $request->resign_survei_ceklis_keterangan_11,
            $request->resign_survei_ceklis_keterangan_12,
            $request->resign_survei_ceklis_keterangan_13,
            $request->resign_survei_ceklis_keterangan_14,
            $request->resign_survei_ceklis_keterangan_15,
            $request->resign_survei_ceklis_keterangan_16,
            $request->resign_survei_ceklis_keterangan_17,
            $request->resign_survei_ceklis_keterangan_18,
            $request->resign_survei_ceklis_keterangan_19,
            $request->resign_survei_ceklis_keterangan_20,
            $request->resign_survei_ceklis_keterangan_21,
            $request->resign_survei_ceklis_keterangan_22,
            $request->resign_survei_ceklis_keterangan_23,
            $request->resign_survei_ceklis_keterangan_24,
            $request->resign_survei_ceklis_keterangan_25,
            $request->resign_survei_ceklis_keterangan_26,
            $request->resign_survei_ceklis_keterangan_27,
        ];

        foreach ($request->hc_resign_survei_nama_ceklis_id as $key => $value) {
            $survei_ceklis = new HcResignSurveiCeklis;
            $survei_ceklis->master_karyawan_id = $request->master_karyawan_id;
            $survei_ceklis->nama_ceklis = $value;
            $survei_ceklis->keterangan = $data_survei_ceklis[$key];
            $survei_ceklis->save();
        }

        $data_survei_essay = [
            $request->resign_survei_essay_1,
            $request->resign_survei_essay_2,
            $request->resign_survei_essay_3,
            $request->resign_survei_essay_4,
        ];

        foreach ($request->hc_resign_survei_nama_essay_id as $key => $value) {
            $survei_essay = new HcResignSurveiEssay;
            $survei_essay->master_karyawan_id = $request->master_karyawan_id;
            $survei_essay->nama_essay = $value;
            $survei_essay->keterangan = $data_survei_essay[$key];
            $survei_essay->save();
        }

        return redirect()->route('cir.index_resign')->with('status', 'Data berhasil disimpan');
    }

    public function resignFormIndex()
    {
        $cirs = HcResign::get();

        return view('hc_resign.index', ['cirs' => $cirs]);
    }

    public function resignShow($id)
    {
        $resign = HcResign::with(['masterKaryawan', 'masterJabatan'])->find($id);
        $atasan = MasterKaryawan::find($resign->atasan);
        $resign_ceklis = HcResignCeklis::where('master_karyawan_id', $resign->master_karyawan_id)->get();
        $resign_survei_ceklis = HcResignSurveiCeklis::where('master_karyawan_id', $resign->master_karyawan_id)->get();
        $resign_survei_essay = HcResignSurveiEssay::where('master_karyawan_id', $resign->master_karyawan_id)->get();

        return view('hc_resign.detail', [
            'resign' => $resign, 
            'atasan' => $atasan, 
            'resign_ceklis' => $resign_ceklis,
            'resign_survei_ceklis' => $resign_survei_ceklis,
            'resign_survei_essay' => $resign_survei_essay
            ]);
    }

    public function resignDelete(Request $request, $id)
    {
        $resign = HcResign::find($id);

        $resign_ceklis = HcResignCeklis::where('master_karyawan_id', $resign->master_karyawan_id);
        $resign_ceklis->delete();

        $resign_survei_ceklis = HcResignSurveiCeklis::where('master_karyawan_id', $resign->master_karyawan_id);
        $resign_survei_ceklis->delete();

        $resign_survei_essay = HcResignSurveiEssay::where('master_karyawan_id', $resign->master_karyawan_id);
        $resign_survei_essay->delete();
        
        $resign->delete();

        return redirect()->route('cir.index_form_resign')->with('status', 'Data berhasil dihapus');
    }

    public function resignAtasanApprove($id)
    {
        $cuti = HcResign::find($id);
        $cuti->status = 2;
        $cuti->save();

        return redirect()->route('cir.index_form_resign')->with('status', 'Cuti Di Approve');
    }

    public function resignAtasanTolak($id)
    {
        $cuti = HcResign::find($id);
        $cuti->status = 3;
        $cuti->save();

        return redirect()->route('cir.index_form_resign')->with('status', 'Cuti Di Tolak');
    }

    public function resignHcApprove($id)
    {
        $cuti = HcResign::find($id);
        $cuti->status = 4;
        $cuti->save();

        return redirect()->route('cir.index_form_resign')->with('status', 'Cuti Di Approve');
    }

    public function resignHcTolak($id)
    {
        $cuti = HcResign::find($id);
        $cuti->status = 5;
        $cuti->save();

        return redirect()->route('cir.index_form_resign')->with('status', 'Cuti Di Tolak');
    }

    public function resignDirekturApprove($id)
    {
        $cuti = HcResign::find($id);
        $cuti->status = 6;
        $cuti->save();

        return redirect()->route('cir.index_form_resign')->with('status', 'Cuti Di Approve');
    }

    public function resignDirekturTolak($id)
    {
        $cuti = HcResign::find($id);
        $cuti->status = 7;
        $cuti->save();

        return redirect()->route('cir.index_form_resign')->with('status', 'Cuti Di Tolak');
    }
}
