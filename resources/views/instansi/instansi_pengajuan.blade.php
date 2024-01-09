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
        <button type="button" class="btn btn-primary btn-icon-text mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="btn-icon-prepend" data-feather="plus-circle"></i>
          Tambah Data
        </button>
        <div class="table-responsive">
            <table id="dataTableExample" class="table">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama Pembimbing</th>
                  <th>Nama Siswa</th>
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
                    <td>{{$i->status_pengajuan}}</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic Example">
                        <button type="button" class="btn btn-warning btn-icon user_edit">
                          <a href="" id="editInstansi" data-bs-toggle="modal" data-bs-target="#editModal-{{ $i->id }}" data-id="{{ $i->id }}" style="color: black"><i class="btn-icon-prepend" data-feather="edit"></i></a>
                        </button>
                        <a href="{{ route('deleteUser',$i->id) }}" data-confirm-delete="true" class="btn btn-danger btn-icon"><i class="btn-icon-prepend" data-confirm-delete="true" data-feather="trash-2" ></i></a>
                        <!-- Modal -->
                          <div class="modal fade" id="editModal-{{ $i->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                  <form class="forms-sample" action="admin/user/{{ $i->id }}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $i->name }}">
                                    </div>
                                      <div class="mb-3">
                                          <label for="username" class="form-label">Username</label>
                                          <input type="text" class="form-control" name="username" id="username" autocomplete="off" disabled value="{{ $i->username }}">
                                          <input type="text" name="id_user" id="id_user" hidden value={{ $i->id }}>
                                      </div>
                                      <div class="mb-3">
                                          <label for="email" class="form-label">Email</label>
                                          <input type="text" class="form-control" name="email" id="email" autocomplete="off" value="{{ $i->email }}">
                                      </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="tutupEdit">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </form>
                            </div>
                          </div>
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
    <form class="forms-sample" action="admin/user" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Username</label>
                <select class="form-select" id="exampleFormControlSelect1" name="id_tim">
                  <option value="" selected disabled>---PILIH USER---</option>
                  @foreach ($user as $u)
                  @if(is_null($u->id_auth))
                  <option value="{{ $u->id }}">{{ $u->username }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Nama" name="nama">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="contoh@mail.com" name="email">
              </div>
              <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username" name="username">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" name="password">
              </div>
              <div class="mb-3">
                <label for="ageSelect" class="form-label">Role</label>
                <select class="form-select" name="role" id="ageSelect">
                  <option selected="" disabled="">---ROLE---</option>
                  <option>Instansi</option>
                  <option>Pembimbing</option>
                  <option>Siswa</option>
                  <option>Staff</option>
                  <option>Mentor</option>
                </select>
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