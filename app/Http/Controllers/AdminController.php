<?php

namespace App\Http\Controllers;

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

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
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

    
}
