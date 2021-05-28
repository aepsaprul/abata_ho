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

class HcCirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cirs = HcCir::get();
        $jabatans = MasterJabatan::get();

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
        
        return view('cir.create', ['karyawans' => $karyawans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->jenis == "cuti") {
        //     # code...
        //     $cutis = new HcCuti;
        //     $cutis->master_karyawan_id = $request->master_karyawan_id;
        //     $cutis->master_jabatan_id = $request->master_jabatan_id;
        // } else {
        //     $resign = new HcResign;
        //     $resign_ceklis = new HcResignCeklis;
        //     $resign_survei_ceklis = new HcResignSurveiCeklis;
        // }
            dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
