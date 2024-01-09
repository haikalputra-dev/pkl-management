<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function InstansiDashboard()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('instansi.index',compact('profileData'));
    }
    public function instansiLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
