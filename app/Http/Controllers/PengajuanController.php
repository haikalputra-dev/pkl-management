<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Pengajuan;
use App\Models\Tim;
use App\Models\Siswa;
use App\Models\Pembimbing;
use App\Models\User;
use App\Models\Instansi;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $idInstansi = Instansi::where('id_auth','=',$id)->first();
        // $pengajuan = Pengajuan::where('id_instansi',$idInstansi->id)->get();
        $pengajuan = DB::table('pengajuan')
                    ->select('pengajuan.*','tim.id_pembimbing','tim.id_siswa','pembimbing.nama_pembimbing','siswa.nama_siswa')
                    ->join('tim','tim.id','=','pengajuan.id_tim')
                    ->join('pembimbing','pembimbing.id','=','tim.id_pembimbing')
                    ->join('siswa','siswa.id','=','tim.id_siswa')
                    ->get();

        $resultPengajuan = [];
        // foreach ($pengajuan as $p) {
        //     $timPengajuan = Tim::where('id_instansi',$idInstansi->id)->get();
        // }
        $timData = Tim::where('id_instansi','=',$idInstansi->id)->get();
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
