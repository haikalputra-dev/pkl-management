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
        $title = 'Delete User!';
        $text = "Yakin Hapus Data User?";
        confirmDelete($title, $text);
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
        $username           = $request->input('username');
        $password           = $request->input('password');
        $email              = $request->input('email');
        $user_id = User::create([
            'name'          => $request->input('nama_instansi'),
            'username'      => $username,
            'email'         => $email,
            'password'      => bcrypt($password),
            'role'          => 'instansi',
            'status'        => 'inaktif' 
        ]);

        $id_auth            = $user_id -> id;
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

    public function storeDaftar(Request $request)
    {
        $username           = $request->input('username');
        $password           = $request->input('password');
        $email              = $request->input('email');
        $user_id = User::create([
            'name'          => $request->input('nama_instansi'),
            'username'      => $username,
            'email'         => $email,
            'password'      => bcrypt($password),
            'role'          => 'instansi',
            'status'        => 'inaktif' 
        ]);

        $id_auth            = $user_id -> id;
        $nama_instansi      = $request->input('nama_instansi');
        $npsn               = $request->input('npsn');
        $jenis_sekolah      = $request->input('jenis_sekolah');
        $alamat             = $request->input('alamat');
        $telepon            = $request->input('telepon');
        // DB::insert('insert into users (id_user, nama_instansi) values (?, ?)', [$id_user, $nama]);
        Instansi::create([
            'nama_instansi'     => $nama_instansi,
            'npsn'              => $npsn,
            'jenis_sekolah'     => $jenis_sekolah,
            'alamat'            => $alamat,
            'telepon'           => $telepon,
        ]);
        Alert::success('Success!',"Pembuatan Akun Diajukan!");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Instansi $instansi)
    {
    
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
    public function update(Request $request)
    {
        $id = $request->input('id');
        $instansi = Instansi::find($id);

        $instansi->nama_instansi        = $request->input('nama_instansi');
        $instansi->npsn                 = $request->input('npsn');
        $instansi->jenis_sekolah        = $request->input('jenis_sekolah');
        $instansi->alamat               = $request->input('alamat');
        $instansi->telepon              = $request->input('telepon');
        $instansi->save();
        Alert::success('Success!',"User Berhasil Diupdate!");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instansi $instansi)
    {
        //
    }

    public function destroyInstansi($id)
    {
        Instansi::destroy($id);
        Alert::success('Success!',"User Berhasil Dihapus!");
        return back();
    }
}
