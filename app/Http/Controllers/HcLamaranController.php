<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HcLamaran;
use Illuminate\Http\Request;
use App\Models\MasterKaryawan;
use Illuminate\Support\Facades\Auth;

class HcLamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lamarans = HcLamaran::get();

        return view('lamaran.index', ['lamarans' => $lamarans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lamaran = HcLamaran::with('masterJabatan')->find($id);

        return view('lamaran.detail', ['lamaran' => $lamaran]);
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
        $lamaran = HcLamaran::find($id);
        $lamaran->delete();

        $user = User::where('email', $lamaran->email);
        $user->delete();

        return redirect()->route('lamaran.index')->with('status', 'Data berhasil dihapus');
    }

    public function rekrutmen($id)
    {
        $lamaran = HcLamaran::find($id);
        $lamaran->status_lamaran = 2;
        $lamaran->save();

        return redirect()->route('lamaran.index');
    }

    public function gagalInterview($id)
    {
        $lamaran = HcLamaran::find($id);
        $lamaran->status_lamaran = 4;
        $lamaran->save();

        return redirect()->route('lamaran.index');
    }

    public function interview($id)
    {
        $lamaran = HcLamaran::find($id);
        $lamaran->status_lamaran = 5;
        $lamaran->save();

        return redirect()->route('lamaran.index');
    }
    
    public function gagal($id)
    {
        $lamaran = HcLamaran::find($id);
        $lamaran->status_lamaran = 6;
        $lamaran->save();

        return redirect()->route('lamaran.index');
    }

    public function terima($id)
    {
        $lamaran = HcLamaran::find($id);
        $lamaran->status_lamaran = 7;
        $lamaran->save();

        $karyawan = new MasterKaryawan;
        $karyawan->nama_lengkap = $lamaran->nama_lengkap;
        $karyawan->nama_panggilan = $lamaran->nama_panggilan;
        $karyawan->telepon = $lamaran->telepon;
        $karyawan->email = $lamaran->email;
        $karyawan->nomor_ktp = $lamaran->nomor_ktp;
        $karyawan->nomor_sim = $lamaran->nomor_sim;
        $karyawan->agama = $lamaran->agama;
        $karyawan->foto = $lamaran->foto;
        $karyawan->master_jabatan_id = $lamaran->master_jabatan_id;
        $karyawan->jenis_kelamin = $lamaran->jenis_kelamin;
        $karyawan->tempat_lahir = $lamaran->tempat_lahir;
        $karyawan->tanggal_lahir = $lamaran->tanggal_lahir;
        $karyawan->alamat_asal = $lamaran->alamat_ktp;
        $karyawan->alamat_domisili = $lamaran->alamat_sekarang;
        $karyawan->status_perkawinan = $lamaran->status_perkawinan;
        $karyawan->save();

        return redirect()->route('lamaran.index');
    }
}
