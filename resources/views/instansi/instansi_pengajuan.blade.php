@extends('instansi.instansi_dashboard')
@section('instansi')
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
        <button type="button" class="btn btn-primary btn-icon-text mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="btn-icon-prepend" data-feather="plus-circle"></i>
          Buat Pengajuan
        </button>
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
                          <a href="{{ route('detailPengajuanInst',$i->id) }}" id="editInstansi" style="color: black"><i class="btn-icon-prepend" data-feather="edit"></i></a>
                        </button>
                        <a href="{{ route('deletePengajuan',$i->id) }}" data-confirm-delete="true" class="btn btn-danger btn-icon"><i class="btn-icon-prepend" data-confirm-delete="true" data-feather="trash-2" ></i></a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="forms-sample" action="/instansi/pengajuan" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <input type="text" value="{{ $idInstansi->id }}" name="id_instansi" hidden>
        <div class="mb-3">
          <label for="exampleFormControlSelect1" class="form-label">Tim</label>
          <select class="form-select" id="exampleFormControlSelect1" name="id_tim">
            <option value="" selected disabled>---PILIH TIM---</option>
            @foreach ($resultData as $u)
            <option value="{{ $u['id'] }}">Pembimbing : {{ implode(', ', $u['nama_pembimbing']) }} | Siswa: {{ implode(', ', $u['nama_siswa']) }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="formFile">Upload Dokumen</label>
          <input class="form-control" type="file" id="formFile" name="file">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </form>
  </div>
  </div>
@endsection