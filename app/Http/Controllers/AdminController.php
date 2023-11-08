<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
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
    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->photo = $request->photo;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/') . $data->photo);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();

        //gagal notifikasi 
        // $notification = array(
        //     'message' => 'Admin profile updated sucsess',
        //     'alert-type' => 'sucsess'
        // );

        return redirect()->back();
    }
    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view(('admin.admin_change_password'), compact('profileData'));
    }
    public function AdminUpdatePassword(Request $request)
    {
        //validation   
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        ///password harus sama
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return redirect()->back();
        }
        //update password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
    }

    public function AdminDataMaster()
    {
        $users = DB::table('users')->get();
        return view(('admin.admin_data_master'), compact('users'));
    }
    public function AdminCreateData()
    {

        return view(('admin.datamaster.create'),);
    }
    public function AdminDataStore(Request $request)
    {
        User::create($request->all());
        return redirect()->route('admin.create.data')->withSuccess('create user success');
    }
    function AdminDeleteUser(Request $request)
    {
        $request->delete();
        return redirect()->route('admin.DataMaster')
            ->with('success', 'Kamar Theresia deleted successfully');
    }
    function AdminEditData()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.datamaster.edit', compact('profileData'));
    }
    public function AdminInstansi()
    {
        $instansis = DB::table('instansi')
            ->join('users', 'users.id', 'instansi.id_user')
            ->select('instansi.id', 'users.username', 'users.email', 'instansi.nama_instansi')->get();

        return view('admin.data_master.instansi_master', compact('instansis'));
    }

    function insertInstansi(Request $request)
    {
        $id_user = $request->input('id_user');
        $nama = $request->input('nama');
        DB::insert('insert into instansi (id_user, nama_instansi) values (?, ?)', [$id_user, $nama]);
        return redirect()->route('admin.instansi');
    }

    function destroyInstansi($id)
    {
        DB::delete('delete from instansi where id = ?', [$id]);
        return redirect()->route('admin.instansi');
    }

    function editInstansi($id)
    {
        $instansi = DB::table('instansi')
            ->join('users', 'users.id', 'instansi.id_user')
            ->select('instansi.id', 'instansi.id_user', 'users.username', 'users.email', 'instansi.nama_instansi')
            ->where('instansi.id', $id)->first();
        return view('admin.data_master.instansi_edit', compact('instansi'));
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
