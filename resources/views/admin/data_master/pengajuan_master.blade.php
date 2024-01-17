@extends('admin.admin_dashboard')
@section('admin')
@include('sweetalert::alert')
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
        <h6 class="card-title">User</h6>
        {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
        {{-- <button type="button" class="btn btn-primary btn-icon-text mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="btn-icon-prepend" data-feather="plus-circle"></i>
          Buat Pengajuan
        </button> --}}
        <div class="table-responsive">
            <table id="dataTableExample" class="table">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama Pembimbing</th>
                  <th>Nama Siswa</th>
                  <th>Dokumen</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pengajuan as $i)
                <tr>
                    <td>{{$i->id}}</td>
                    <td>{{$i->nama_pembimbing}}</td>
                    <td>{{$i->nama_siswa}}</td>
                    <td>
                      <a href="{{ URL::asset("upload/dokumen-pengajuan/$i->dokumen") }}" download>{{ $i->dokumen }}</a>
                    </td>
                    <td>{{$i->status_pengajuan}}</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic Example">
                        <button type="button" class="btn btn-warning btn-icon user_edit">
                          <a href="{{ route('detailPengajuan',$i->id) }}" id="editInstansi" style="color: black"><i class="btn-icon-prepend" data-feather="edit"></i></a>
                        </button>
                    </td>
                      </tr>
                      
                      @endforeach
                    </tbody>
                  </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection