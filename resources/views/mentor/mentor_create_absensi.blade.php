@extends('user.user_dashboard')
@section('user')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Nama</th>
                                    <th>Jam Masuk</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            @foreach($datapresensi as $p)
                            @php
                            $path = Storage::url('public/upload/absensi/'.$p->foto_in);
                            @endphp
                            <tbody>
                                <th><img src="{{url($path)}}" alt="Foto Absen" width="50"></th>

                                <th>{{$p->name}}</th>
                                <th>{{$p->jam_masuk}}</th>
                                <th>{{$p->tanggal}}</th>
                                <th>{{$p->keterangan}}</th>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>






@endsection
