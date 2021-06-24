<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Agama;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pegawai::latest()->paginate(5);
        
        return view('pegawai.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $agama = Agama::all();
        $jabatan = Jabatan::all();
        return view('pegawai.create',compact('agama','jabatan'));

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
            'nik' => 'required|unique:pegawai',
            'nama' => 'required',
            'agama_id' => 'required',
            'jabatan_id' => 'required',
            'tgl_pegawai' => 'required',
        ]);
    
        Pegawai::create($request->all());
     
        return redirect()->route('pegawai.index')
                        ->with('success','Pegawai created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
        return view('pegawai.show',compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
        $agama = Agama::all();
        $jabatan = Jabatan::all();
        return view('pegawai.edit',compact('pegawai','agama','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
        $request->validate([
            'nik' => 'required|unique:pegawai',
            'nama' => 'required',
            'agama_id' => 'required',
            'jabatan_id' => 'required',
            'tgl_pegawai' => 'required',
        ]);
    
        $pegawai->update($request->all());
    
        return redirect()->route('pegawai.index')
                        ->with('success','Pegawai updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
        $pegawai->delete();
        return redirect()->route('pegawai.index')
                        ->with('success','Pegawai deleted successfully');
    }
}
