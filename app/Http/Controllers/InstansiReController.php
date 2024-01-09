<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Instansi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstansiReController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user     = DB::table('users')
                    ->select('users.*','instansi.id_auth')
                    ->leftjoin('instansi','instansi.id_auth','=','users.id')
                    ->where('users.role','instansi')
                    ->get();
        $instansi = DB::table('instansi')
                    ->select('instansi.*','users.username','users.email')
                    ->join('users','users.id','=','instansi.id_auth')
                    ->where('users.role','instansi')
                    ->get();
        return view('admin.data_master.instansi_master', compact('instansi','user'));
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
    public function store(Request $request)
    {
        $id_auth            = $request->input('id_auth');
        $nama_instansi      = $request->input('nama_instansi');
        $npsn               = $request->input('npsn');
        $jenis_sekolah      = $request->input('jenis_sekolah');
        $alamat             = $request->input('alamat');
        $telepon            = $request->input('telepon');
        // DB::insert('insert into users (id_user, nama_instansi) values (?, ?)', [$id_user, $nama]);
        Instansi::create([
            'id_auth'           => $id_auth,
            'nama_instansi'     => $nama_instansi,
            'npsn'              => $npsn,
            'jenis_sekolah'     => $jenis_sekolah,
            'alamat'            => $alamat,
            'telepon'           => $telepon,
        ]);
        Alert::success('Success!',"User Berhasil Dibuat!");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Instansi $instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instansi $instansi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instansi $instansi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instansi $instansi)
    {
        //
    }
}
