<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\StorageAttributes;
use Illuminate\Support\Facades\DB;
use App\Models\Absensi;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\UploadedFile;

use App\Models\Jurnal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function UserDashboard()
    {
        $hariini = date("Y-m-d");
        $id = Auth::guard('web')->user()->id;
        $cek = DB::table('absensi')->where('tanggal', $hariini)->where('user_id', $id)->count();
        $presensihariini = DB::table('absensi')->where('tanggal', $hariini)->where('user_id', $id)->first();

        return view('user.index', compact('cek', 'presensihariini'));
    }
    public function UserLogout(Request $request)
    { {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }

    public function UserPresensi()
    {

        return view('user.presensi');
    }
    public function UserPresensis()
    {
        $id = Auth::guard('web')->user()->id;
        $bulanini = date('m');
        $tahunini = date('Y');
        $datapresensi = DB::table('absensi')->join('users', 'absensi.user_id', '=', 'users.id')->where('user_id', $id)->whereRaw('MONTH(tanggal)="' . $bulanini . '"')->whereRaw('YEAR(tanggal)="' . $tahunini . '"')->orderBy('tanggal')->select('absensi.*', 'users.name')->get();
        return view('user.data_presensi', compact('datapresensi'));
    }

    public function store(Request $request)
    {
        $id = Auth::guard('web')->User()->id;
        $tanggal = date("Y-m-d");
        $jam = date("H:i:s");
        $image = $request->image;
        $folderPath = "public/upload/absensi/";
        $image_part = explode(";base64", $image);
        $image_base64 = base64_decode($image_part[1]);
        $filename = uniqid() . ".png";
        $file = $folderPath . $filename;
        $data = [

            'user_id' => $id,
            'tanggal' => $tanggal,
            'jam_masuk' => $jam,
            'foto_in' => $filename
        ];
        $simpan = DB::table('absensi')->insert($data);
        if ($simpan) {
            echo 0;
            Storage::put($file, $image_base64);
        } else {
            echo 1;
        }
    }

    public function UserJurnal()
    {
        $id = Auth::guard('web')->User()->id;
        $datajurnal = DB::table('jurnal')->get();
        return view('user.jurnal',compact('datajurnal'));
    }
    public function CreateJurnal()
    {

        return view('user.create_jurnal');
    }

    public function Jurnalstore(Request $request): RedirectResponse
    {
        $id_siswa = Auth::guard('web')->User()->id;
        $request->validate([
            'foto_jr' => 'required|mimes:pdf,xlx,csv,png|max:2048',
            'keterangan' => 'required'
        ]);

        $fileName = time() . '.' . $request->foto_jr->extension();
        
        $nama= DB::table('absensi')->join('users', 'absensi.user_id', '=', 'users.id')->where('user_id', $id)->select('user.name','absensi.*')->get();
        $keterangan = $request->keterangan;
        $fileModel->nama = $nama;
        $fileModel = new Jurnal();
        $fileModel->id_siswa = $id_siswa;
        $fileModel->id_mentor = $id_siswa;
        $fileModel->keterangan = $keterangan;   // Replace YourModel with the actual model you are using
        $fileModel->foto_jr = $fileName;
        $fileModel->save();
        /*
            Write Code Here for
            Store $fileName name in DATABASE from HERE
        */

        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }

    public function UserMateri()
    {
        $id = Auth::guard('web')->User()->id;
        $datajurnal = DB::table('materi')->get();

        return view('user.materi',compact('datajurnal'));
    }
}
