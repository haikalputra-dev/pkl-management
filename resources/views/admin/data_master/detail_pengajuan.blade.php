@extends('admin.admin_dashboard')
@section('admin')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/pengajuan">Pengajuan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Pengajuan</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Timeline</h6>
                    <form action="{{ route('updatePengajuan',$pengajuan->id) }}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="komentar"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Dokumen</label>
                                <a href="{{ URL::asset("upload/dokumen-pengajuan/$pengajuan->dokumen") }}" download>{{ $pengajuan->dokumen }}</a>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Status Pengajuan</label>
                                <select class="form-select" id="exampleFormControlSelect1" name="status_pengajuan">
                                    <option value="Draft" {{ $pengajuan->status_pengajuan === "Draft" ? "selected" : "" }}>Draft</option>
                                    <option value="Diserahkan" {{ $pengajuan->status_pengajuan === "Diserahkan" ? "selected" : "" }}>Diserahkan</option>
                                    <option value="Ditunda" {{ $pengajuan->status_pengajuan === "Ditunda" ? "selected" : "" }}>Ditunda</option>
                                    <option value="Diterima" {{ $pengajuan->status_pengajuan === "Diterima" ? "selected" : "" }}>Diterima</option>
                                    <option value="Ditolak" {{ $pengajuan->status_pengajuan === "Ditolak" ? "selected" : "" }}>Ditolak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Komentar</button>
                </form>
                    <div id="content">
                    <ul class="timeline">
                        @foreach($log as $i)
                        <li class="event" data-date="{{ $i->timestamp }}">
                        <h3 class="title">{{ $i->status_log }}</h3>
                        <p class="text-secondary">from: {{ $i->username }}</p>
                        <p>{{ $i->komentar }}</p>
                        </li>
                        @endforeach
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection