<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HcLamaran;
use Illuminate\Http\Request;
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
}
