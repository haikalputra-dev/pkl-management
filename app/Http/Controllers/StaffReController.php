<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffReController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = DB::table('staff')
        ->select('staff.*','users.username','users.email')
        ->join('users','users.id','=','staff.id_auth')
        ->where('users.role','staff')
        ->get();
        // $staff = Staff::all();
        $title = 'Delete User!';
        $text = "Yakin Hapus Data User?";
        confirmDelete($title, $text);
        return view('admin.data_master.staff_master', compact('staff'));
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
            'name'          => $request->input('nama_staff'),
            'username'      => $username,
            'email'         => $email,
            'password'      => bcrypt($password),
            'role'          => 'staff',
            'status'        => 'inaktif' 
        ]);

        $id_auth            = $user_id -> id;
        $nama_staff         = $request->input('nama_staff');
        $tgl_lahir          = $request->input('tgl_lahir');
        $gender             = $request->input('gender');
        $alamat             = $request->input('alamat');
        $agama              = $request->input('agama');
        $telepon            = $request->input('telepon');
        // DB::insert('insert into users (id_user, nama_instansi) values (?, ?)', [$id_user, $nama]);
        Staff::create([
            'id_auth'           => $id_auth,
            'nama_staff'        => $nama_staff,
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
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = $request->input('id');
        $staff = Staff::find($id);

        $staff->nama_staff       = $request->input('nama_staff');
        $staff->tgl_lahir        = $request->input('tgl_lahir');
        $staff->jenis_kelamin    = $request->input('jenis_kelamin');
        $staff->alamat           = $request->input('alamat');
        $staff->agama            = $request->input('agama');
        $staff->no_telp          = $request->input('telepon');
        $staff->save();
        Alert::success('Success!',"User Berhasil Diupdate!");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        
    }

    public function destroyStaff($id)
    {
        Staff::destroy($id);
        Alert::success('Success!',"User Berhasil Dihapus!");
        return back();
    }
}
