<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use app\Models\User;

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

        return redirect('/login');
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }
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
}
