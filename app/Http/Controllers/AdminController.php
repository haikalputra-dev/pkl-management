<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Support\Facades\Hash;
use Alert;
use App\Models\Post;
use App\Models\Instansi;
use App\Models\LogPengajuan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    function indexPengajuan() 
    {
        $pengajuan = DB::table('pengajuan')
        ->select('pengajuan.*','tim.id_pembimbing','tim.id_siswa','pembimbing.nama_pembimbing','siswa.nama_siswa')
        ->join('tim','tim.id','=','pengajuan.id_tim')
        ->join('pembimbing','pembimbing.id','=','tim.id_pembimbing')
        ->join('siswa','siswa.id','=','tim.id_siswa')
        ->get();
        $title = 'Delete Pengajuan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.data_master.pengajuan_master', compact('pengajuan'));    
    }

    function detailPengajuan($id){
        $log = DB::table('log_pengajuan')
        ->select('*')
        ->where('id_pengajuan',$id)
        ->get();
        $pengajuan = Pengajuan::where('id',$id)->first();
        
        return view('admin.data_master.detail_pengajuan',compact('log','pengajuan'));  
    }

    function updatePengajuan(Request $request,$id)
    {
        $ids = Auth::user()->id;
        $data = User::find($ids);
        
        LogPengajuan::create([
            'id_pengajuan'      => $id,
            'username'          => $data->username,
            'komentar'          => $request->input('komentar'),
            'status_log'        => $request->input('status_pengajuan')
        ]);

        $pengajuan = Pengajuan::find($id);
        $pengajuan->status_pengajuan = $request->input('status_pengajuan');
        $pengajuan->save();
        Alert::success('Success!',"Pengajuan Diubah!");
        return back();
    }

    public function AdminDashboard()
    {
        $user = User::count();
        return view('admin.index',compact('user'));
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

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
        $title = 'Delete Data!';
        $text = "Yakin Hapus Data?";
        confirmDelete($title, $text);
        return view(('admin.admin_data_master'), compact('users'));
    }

    function updateStatusAktif($type,$id) 
    {
        $user = User::find($id);
        $user->status   = $type;
        $user->save();
        Alert::success('Success!',"Status User Berhasil Diubah!");
        return back();
    }

    public function AdminCreateData()
    {
        return view(('admin.datamaster.create'),);
    }
    public function AdminDataStore(Request $request)
    {
        User::create($request->all());
        Alert::success('Hore!','Successfully');
        return redirect()->route('admin.create.data');
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

    
}
