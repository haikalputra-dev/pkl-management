<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use app\Models\User;

class StaffController extends Controller
{
    public function StaffDashboard()
    {
        return view('staff.index');
    }
    public function StaffLogout(Request $request)
    { {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }
}
