<?php

namespace App\Http\Controllers;

use app\Models\User;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    public function crudData()
    {
        return view('admin.datamaster.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // public function AdminLogin()
    // {
    //     return view('admin.admin_login');
    // }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view(('admin.admin_profile_view'), compact('profileData'));
    }
    public function AdminDataMaster()
    {

        return view(('admin.admin_data_master'),);
    }

    public function AdminInstansi() {
        $instansis = DB::table('instansi')
        ->join('users','users.id','instansi.id_user')
        ->select('instansi.id','users.username','users.email','instansi.nama_instansi')->get();

        return view('admin.data_master.instansi_master',compact('instansis'));
    }

    function insertInstansi(Request $request) {
        $id_user = $request->input('id_user');
        $nama = $request->input('nama');
        DB::insert('insert into instansi (id_user, nama_instansi) values (?, ?)', [$id_user, $nama]);
        return redirect()->route('admin.instansi');
    }

    function destroyInstansi($id) {
        DB::delete('delete from instansi where id = ?',[$id]);
        return redirect()->route('admin.instansi');
    }

    function editInstansi($id) {
        $instansi = DB::table('instansi')
        ->join('users','users.id','instansi.id_user')
        ->select('instansi.id','instansi.id_user','users.username','users.email','instansi.nama_instansi')
        ->where('instansi.id',$id)->first();
        return view('admin.data_master.instansi_edit',compact('instansi'));
    }

    function updateInstansi($id, Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'nama_instansi' => 'required',
        ]); 
        
        $instansi = Instansi::findOrFail($id);
        $instansi->update([
            'nama_instansi' => $request->nama_instansi
        ]);
        return redirect()->route('admin.instansi');
    }
    
}
