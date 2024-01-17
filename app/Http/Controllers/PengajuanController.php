<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Pengajuan;
use App\Models\Tim;
use App\Models\Siswa;
use App\Models\Pembimbing;
use App\Models\User;
use App\Models\Instansi;
use App\Models\LogPengajuan;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $idInstansi = Instansi::where('id_auth','=',$id)->first();
        // $pengajuan = Pengajuan::where('id_instansi',$idInstansi->id)->get();
        $pengajuan = DB::table('pengajuan')
                    ->select('pengajuan.*','tim.id_pembimbing','tim.id_siswa','pembimbing.nama_pembimbing','siswa.nama_siswa')
                    ->join('tim','tim.id','=','pengajuan.id_tim')
                    ->join('pembimbing','pembimbing.id','=','tim.id_pembimbing')
                    ->join('siswa','siswa.id','=','tim.id_siswa')
                    ->get();

        $resultPengajuan = [];
        // foreach ($pengajuan as $p) {
        //     $timPengajuan = Tim::where('id_instansi',$idInstansi->id)->get();
        // }
        $timData = Tim::where('id_instansi','=',$idInstansi->id)->get();
        $resultData = [];
        foreach ($timData as $tim) {
            $idSiswaArray = explode('|', $tim->id_siswa);

            $siswaNames = Siswa::whereIn('id', $idSiswaArray)->pluck('nama_siswa')->toArray();
            $instansiNames = Instansi::where('id', $tim->id_instansi)->pluck('nama_instansi')->toArray();
            $pembimbingNames = Pembimbing::where('id', $tim->id_pembimbing)->pluck('nama_pembimbing')->toArray();

            $resultData[] = [
                'id' => $tim->id,
                'nama_siswa' => $siswaNames,
                'nama_instansi' => $instansiNames,
                'nama_pembimbing' => $pembimbingNames,
            ];
        }
        $title = 'Delete Pengajuan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('instansi.instansi_pengajuan', compact('pengajuan','resultData','idInstansi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanRequest $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $fileName = time().'.'.$request->file->extension();  
       
        $request->file->move(public_path('upload/dokumen-pengajuan'), $fileName);
        Pengajuan::create([
            'id_instansi'       => $request->input('id_instansi'),
            'id_tim'            => $request->input('id_tim'),
            'dokumen'           => $fileName,
            'status_pengajuan'  => 'Diserahkan'
        ]);
        Alert::success('Success!',"Pengajuan Berhasil Dibuat!");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanRequest $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }

    public function destroyPengajuan($id)
    {
        Pengajuan::destroy($id);
        Alert::success('Success!',"User Berhasil Dihapus!");
        return back();
    }

    function detailPengajuan($id){
        $log = DB::table('log_pengajuan')
        ->select('*')
        ->where('id_pengajuan',$id)
        ->get();
        $pengajuan = Pengajuan::where('id',$id)->first();
        
        return view('instansi.detail_pengajuan_instansi',compact('log','pengajuan'));  
    }

    function updatePengajuan(Request $request,$id)
    {
        $ids = Auth::user()->id;
        $data = User::find($ids);
        // dd($data->username);
        LogPengajuan::create([
            'id_pengajuan'      => $id,
            'username'          => $data->username,
            'komentar'          => $request->input('komentar'),           
            'status_log'        => $request->input('status_pengajuan')
        ]);

        $pengajuan = Pengajuan::find($id);
        $pengajuan->status_pengajuan = $request->input('status_pengajuan');
        $pengajuan->save();
        Alert::success('Success!',"Komentar Berhasil!");
        return back();
    }
}
