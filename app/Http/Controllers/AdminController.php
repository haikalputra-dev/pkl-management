<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

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

        return view(('admin.admin_data_master'),);
    }
}
