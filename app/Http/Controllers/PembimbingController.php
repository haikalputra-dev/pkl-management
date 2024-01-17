<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Pembimbing;
use App\Models\User;
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
        $title = 'Delete User!';
        $text = "Yakin Hapus Data User?";
        confirmDelete($title, $text);
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
        $username           = $request->input('username');
        $password           = $request->input('password');
        $email              = $request->input('email');
        $user_id = User::create([
            'name'          => $request->input('nama_pembimbing'),
            'username'      => $username,
            'email'         => $email,
            'password'      => bcrypt($password),
            'role'          => 'pembimbing',
            'status'        => 'inaktif' 
        ]);

        $id_auth            = $user_id -> id;
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
    public function update(UpdatePembimbingRequest $request)
    {
        $id = $request->input('id');
        $pembimbing = Pembimbing::find($id);

        $pembimbing->nama_pembimbing  = $request->input('nama_pembimbing');
        $pembimbing->tgl_lahir        = $request->input('tgl_lahir');
        $pembimbing->jenis_kelamin    = $request->input('jenis_kelamin');
        $pembimbing->alamat           = $request->input('alamat');
        $pembimbing->agama            = $request->input('agama');
        $pembimbing->no_telp          = $request->input('telepon');
        $pembimbing->save();
        Alert::success('Success!',"User Berhasil Diupdate!");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPembimbing($id)
    {
        Pembimbing::destroy($id);
        Alert::success('Success!',"User Berhasil Dihapus!");
        return back();
    }
}
