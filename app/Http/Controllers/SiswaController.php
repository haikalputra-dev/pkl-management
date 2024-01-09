<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Siswa;
use App\Models\Instansi;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user    = DB::table('users')
                ->select('users.*','siswa.id_auth')
                ->leftjoin('siswa','siswa.id_auth','=','users.id')
                ->where('users.role','siswa')
                ->get();
        $siswa   = DB::table('siswa')
                ->select('siswa.*','users.id','users.username','instansi.nama_instansi','instansi.id')
                ->join('users','users.id','=','siswa.id_auth')
                ->join('instansi','instansi.id','=','siswa.id_instansi')
                ->get();
        $instansi = Instansi::all();
        return view('admin.data_master.siswa_master', compact('siswa','instansi','user'));
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
    public function store(StoreSiswaRequest $request)
    {
        $id_auth            = $request->input('id_auth');
        $id_instansi        = $request->input('id_instansi');
        $nis                = $request->input('nis');
        $nama_siswa         = $request->input('nama_siswa');
        $tgl_lahir          = $request->input('tgl_lahir');
        $gender             = $request->input('gender');
        $alamat             = $request->input('alamat');
        $agama              = $request->input('agama');
        $telepon            = $request->input('telepon');
        $jurusan            = $request->input('jurusan');
        // DB::insert('insert into users (id_user, nama_instansi) values (?, ?)', [$id_user, $nama]);
        Siswa::create([
            'id_auth'           => $id_auth,
            'id_instansi'       => $id_instansi,
            'nis'               => $nis,
            'nama_siswa'        => $nama_siswa,
            'tgl_lahir'         => $tgl_lahir,
            'jenis_kelamin'     => $gender,
            'alamat'            => $alamat,
            'agama'             => $agama,
            'no_telp'           => $telepon,
            'jurusan'           => $jurusan,
        ]);
        Alert::success('Success!',"User Berhasil Dibuat!");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        $user = User::find($id);

        $user->name             = $request->input('nama');
        $user->email            = $request->input('email');
        $user->status           = $request->input('status_aktif');
        $user->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        User::destroy($user->id);
        // DB::delete('delete from instansi where id = ?', [$id]);
        Alert::success('Success!',"User Berhasil Dihapus!");
        return back();
    }
}
