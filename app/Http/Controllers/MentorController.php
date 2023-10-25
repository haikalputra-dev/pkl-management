<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function MentorDashboard()
    {
        return view('mentor.mentor_dashboard');
    }
}
