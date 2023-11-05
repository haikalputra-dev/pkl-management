<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use app\Models\User;

class MentorController extends Controller
{
    public function MentorDashboard()
    {
        return view('mentor.index');
    }

    public function MentorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function MentorAbsensi()
    {
        $users = DB::table('users')->join('absensi', 'absensi.user_id', '=', 'users.id')->select('users.*', 'absensi.*')->get(['users.name', 'users.address', 'users.role', 'absens.tanggal', 'absens.jam_masuk']);
        return view(('mentor.mentor_absensi'), compact('users'));
    }
    public function MentorCreateAbsensi()
    {
        $id = Auth::user()->id;
        $absensi = User::find($id);
        return view(('mentor.mentor_create_absensi'), compact('absensi'));
    }
    public function MentorJurnal()
    {
        return view('mentor.mentor_jurnal');
    }
}
