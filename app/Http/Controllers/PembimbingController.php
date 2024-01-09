<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Pembimbing;
use App\Http\Requests\StorePembimbingRequest;
use App\Http\Requests\UpdatePembimbingRequest;
use Illuminate\Support\Facades\DB;

class PembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $user       = DB::table('users')
                    ->select('users.*','pembimbing.id_auth')
                    ->leftjoin('pembimbing','pembimbing.id_auth','=','users.id')
                    ->where('users.role','pembimbing')
                    ->get();
        $instansi   = DB::table('instansi')
                    ->select('instansi.*','pembimbing.id_instansi')
                    ->leftjoin('pembimbing','pembimbing.id_instansi','=','instansi.id')
                    // ->where('pembimbing.id_instansi',is_null())
                    ->get();
        $pembimbing = DB::table('pembimbing')
                    ->select('pembimbing.*','users.username','users.email','instansi.nama_instansi')
                    ->join('users','users.id','=','pembimbing.id_auth')
                    ->join('instansi','pembimbing.id_instansi','=','instansi.id')
                    ->where('users.role','pembimbing')
                    ->get();
        return view('admin.data_master.pembimbing_master', compact('pembimbing','instansi','user'));
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
    public function store(StorePembimbingRequest $request)
    {
        $id_auth            = $request->input('id_auth');
        $id_instansi        = $request->input('id_instansi');
        $nama_pembimbing    = $request->input('nama_pembimbing');
        $tgl_lahir          = $request->input('tgl_lahir');
        $gender             = $request->input('gender');
        $alamat             = $request->input('alamat');
        $agama              = $request->input('agama');
        $telepon            = $request->input('telepon');
        // DB::insert('insert into users (id_user, nama_instansi) values (?, ?)', [$id_user, $nama]);
        Pembimbing::create([
            'id_auth'           => $id_auth,
            'id_instansi'       => $id_instansi,
            'nama_pembimbing'   => $nama_pembimbing,
            'tgl_lahir'         => $tgl_lahir,
            'jenis_kelamin'     => $gender,
            'alamat'            => $alamat,
            'agama'             => $agama,
            'no_telp'           => $telepon,
        ]);
        Alert::success('Success!',"User Berhasil Dibuat!");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembimbing $pembimbing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembimbing $pembimbing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembimbingRequest $request, Pembimbing $pembimbing)
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
    public function destroy(Pembimbing $pembimbing)
    {
        User::destroy($user->id);
        // DB::delete('delete from instansi where id = ?', [$id]);
        Alert::success('Success!',"User Berhasil Dihapus!");
        return back();
    }
}
