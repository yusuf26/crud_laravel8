<?php

namespace App\Http\Controllers;

use App\Models\KeluargaPegawai;
use Illuminate\Http\Request;
class KeluargaPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $pegawai_id = $request->input('id');
        return view('pegawai.create_keluarga')
        ->with('id',$pegawai_id);
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
        $request->validate([
            'nama' => 'required',
            'hubungan' => 'required',
        ]);
    
        KeluargaPegawai::create($request->all());
     
        return redirect()->route('pegawai.show',$request->input('pegawai_id'))
                        ->with('success','Keluarga Pegawai created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KeluargaPegawai  $keluargaPegawai
     * @return \Illuminate\Http\Response
     */
    public function show(KeluargaPegawai $keluargaPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KeluargaPegawai  $keluargaPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(KeluargaPegawai $keluargaPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KeluargaPegawai  $keluargaPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KeluargaPegawai $keluargaPegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KeluargaPegawai  $keluargaPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(KeluargaPegawai $keluargaPegawai)
    {
        //
        $keluargaPegawai->delete();
        return back()->withInput()->with('success','Keluarga Pegawai deleted successfully');
    }
}
