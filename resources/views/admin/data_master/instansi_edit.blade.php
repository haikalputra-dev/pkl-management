@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active" aria-current="page">Basic Elements</li>
    </ol>
</nav>

<div class="row">
    {{-- <div class="col-md-6 grid-margin stretch-card"> --}}
<div class="card">
<div class="card-body">

        <h6 class="card-title">Edit Data</h6>

        <form class="forms-sample" action="{{ route('admin.updateInstansi',$instansi->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputUsername1" autocomplete="off" value="{{ $instansi->username }}" disabled>
                <input type="text" name="id_user" value="{{ $instansi->id_user }}" hidden>
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Nama Instansi</label>
                <input type="text" class="form-control" name="nama_instansi" id="exampleInputUsername1" autocomplete="off" value="{{ $instansi->nama_instansi }}">
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <button class="btn btn-secondary">Cancel</button>
        </form>

</div>
</div>
    {{-- </div> --}}
</div>
</div>
@endsection