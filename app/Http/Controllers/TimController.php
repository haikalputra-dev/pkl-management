<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Tim;
use App\Models\Instansi;
use App\Models\Siswa;
use App\Models\Pembimbing;
use App\Http\Requests\StoreTimRequest;
use App\Http\Requests\UpdateTimRequest;
use Illuminate\Support\Facades\DB;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tim    = DB::table('tim')
                ->select('tim.*','siswa.nama_siswa','pembimbing.nama_pembimbing','instansi.nama_instansi')
                ->join('siswa','siswa.id','=','tim.id_siswa')
                ->join('pembimbing','pembimbing.id','=','tim.id_pembimbing')
                ->join('instansi','instansi.id','=','tim.id_instansi')
                ->get();

        $timData = Tim::all();

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

        $siswa      = Siswa::all();
        $pembimbing = Pembimbing::all();
        $instansi   = Instansi::all();
        return view('admin.data_master.tim_master', compact('siswa','instansi','pembimbing','tim','resultData'));
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
    public function store(StoreTimRequest $request)
    {
        $id_instansi        = $request->input('id_instansi');
        $id_pembimbing      = $request->input('id_pembimbing');
        $id_siswa           = $request->input('id_siswa');
        $combinedIds        = implode('|', $id_siswa);
        Tim::create([
            'id_instansi'       => $id_instansi,
            'id_pembimbing'     => $id_pembimbing,
            'id_siswa'          => $combinedIds,
        ]);
        Alert::success('Success!',"Tim Berhasil Dibuat!");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tim $tim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tim $tim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimRequest $request, Tim $tim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tim $tim)
    {
        //
    }

    public function getPembimbingSiswa($id)
    {

        $data['pembimbing'] = Pembimbing::where("id_instansi", $id  )
                                ->get(["nama_pembimbing", "id"]);
        $data['siswa'] = Siswa::where("id_instansi", $id  )
                                ->get(["nama_siswa", "id"]);
  
        return response()->json($data);
    }
}
