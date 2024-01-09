<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Pengajuan;
use App\Models\Tim;
use App\Models\Siswa;
use App\Models\Pembimbing;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = Pengajuan::all();

        $timData = Tim::where();

        $resultData = [];
    
        foreach ($timData as $tim) {
            $idSiswaArray = explode('|', $tim->id_siswa);
    
            $siswaNames = Siswa::whereIn('id', $idSiswaArray)->pluck('nama_siswa')->toArray();
            $instansiNames = Instansi::where('id', $tim->id_instansi)->pluck('nama_instansi')->toArray();
            $pembimbingNames = Pembimbing::where('id', $tim->id_pembimbing)->pluck('nama_pembimbing')->toArray();

            $resultData[] = [
                'id' => $tim->id,
                'nama_siswa' => $siswaNames,
                'nama_instansi' => $instansiNames,
                'nama_pembimbing' => $pembimbingNames,
            ];
        }
        return view('instansi.instansi_pengajuan', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanRequest $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
