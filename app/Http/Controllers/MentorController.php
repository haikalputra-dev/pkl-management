<?php

namespace App\Http\Controllers;


use App\Models\Materi;
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
        $id = Auth::guard('web')->user()->id;
        $bulanini = date('m');
        $tahunini = date('Y');
        $datapresensi = DB::table('absensi')->join('users', 'absensi.user_id','=','users.id')->whereRaw('MONTH(tanggal)="' . $bulanini . '"')->whereRaw('YEAR(tanggal)="' . $tahunini . '"')->orderBy('tanggal')->select('absensi.*','users.name')->get();
        return view(('mentor.mentor_absensi'), compact('datapresensi'));
    }
    public function MentorCreateAbsensi()
    {
        $id = Auth::user()->id;
        $absensi = User::find($id);
        return view(('mentor.mentor_create_absensi'), compact('absensi'));
    }
    public function MentorJurnal()
    {
        $id = Auth::guard('web')->User()->id;
        $datajurnal = DB::table('materi')->get();

        return view('mentor.mentor_jurnal', compact('datajurnal'));
    }
    public function CreateMateri()
    {
        return view('mentor.create_materi');
    }
    public function MentorJurnalPost(Request $request)
    {
        $id_siswa = Auth::guard('web')->User()->id;
        $request->validate([
            'file_name' => 'required|mimes:pdf,xlx,csv,png,docs,docx|max:2048',
            'keterangan' => 'required'
        ]);

        $fileName = time() . '.' . $request->file_name->extension();

        $request->file_name->move(public_path('upload'), $fileName);
        $keterangan = $request->keterangan;
        $fileModel = new Materi;
        $fileModel->id_siswa = $id_siswa;
        $fileModel->id_mentor = $id_siswa;
        $fileModel->keterangan = $keterangan;   // Replace YourModel with the actual model you are using
        $fileModel->file_name = $fileName;
        $fileModel->save();
        /*
            Write Code Here for
            Store $fileName name in DATABASE from HERE
        */

        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
}
