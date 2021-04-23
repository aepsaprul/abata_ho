<?php

namespace App\Http\Controllers;

use App\Models\HcTraining;
use App\Models\MasterDivisi;
use Illuminate\Http\Request;

class HcTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = HcTraining::with('masterDivisi')->get();

        return view('training.index', ['trainings' => $trainings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisis = MasterDivisi::get();
        
        return view('training.create', ['divisis' => $divisis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trainings = new HcTraining;
        $trainings->kategori = $request->kategori;
        $trainings->judul = $request->judul;
        $trainings->master_divisi_id = $request->master_divisi_id;
        $trainings->tanggal = $request->tanggal;
        $trainings->durasi = $request->durasi;
        $trainings->peserta = $request->peserta;
        $trainings->tempat = $request->tempat;
        $trainings->goal = $request->goal;
        $trainings->pengisi = $request->pengisi;
        $trainings->jenis = $request->jenis;
        $trainings->hasil = $request->hasil;
        $trainings->status = $request->status;
        $trainings->save();

        return redirect()->route('training.index')->with('status', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training = HcTraining::find($id);

        return view('training.detail', ['training' => $training]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = HcTraining::find($id);
        $divisis = MasterDivisi::get();

        return view('training.edit', ['training' => $training, 'divisis' => $divisis]);
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
        $training = HcTraining::find($id);
        $training->kategori = $request->kategori;
        $training->judul = $request->judul;
        $training->master_divisi_id = $request->master_divisi_id;
        $training->tanggal = $request->tanggal;
        $training->durasi = $request->durasi;
        $training->peserta = $request->peserta;
        $training->tempat = $request->tempat;
        $training->goal = $request->goal;
        $training->pengisi = $request->pengisi;
        $training->jenis = $request->jenis;
        $training->hasil = $request->hasil;
        $training->status = $request->status;
        $training->save();

        return redirect()->route('training.index')->with('status', 'Data berhasil diubah');
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
