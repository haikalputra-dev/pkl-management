  @extends('admin.admin_dashboard')
  @section('admin')
  @include('sweetalert::alert')
<div class="page-content">

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Instansi</h6>
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
                  <th>Username</th>
                  <th>Email</th>
                  <th>Nama Instansi</th>
                  <th>NPSN</th>
                  <th>Jenis Sekolah</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($instansi as $i)  
                <tr>
                  <td>{{ $i->id }}</td>
                  <td>{{ $i->username }}</td>
                  <td>{{ $i->email }}</td>
                  <td>{{ $i->nama_instansi }}</td>
                  <td>{{ $i->npsn }}</td>
                  <td>{{ $i->jenis_sekolah }}</td>
                  <td>{{ $i->alamat }}</td>
                  <td>{{ $i->telepon }}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                      <button type="button" class="btn btn-warning btn-icon user_edit">
                        <a href="" id="editInstansi" data-bs-toggle="modal" data-bs-target="#editModal-{{ $i->id }}" data-id="{{ $i->id }}" style="color: black"><i class="btn-icon-prepend" data-feather="edit"></i></a>
                      </button>
                      <a href="{{ route('deleteInstansi',$i->id) }}" data-confirm-delete="true" class="btn btn-danger btn-icon"><i class="btn-icon-prepend" data-confirm-delete="true" data-feather="trash-2"></i></a>
                      <!-- Modal -->
                        <div class="modal fade" id="editModal-{{ $i->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                              </div>
                              <div class="modal-body">
                                <form class="forms-sample" action="/admin/instansi/{{ $i->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" autocomplete="off" disabled value="{{ $i->username }}">
                                        <input type="text" name="id" id="id_user" hidden value={{ $i->id }}>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputPassword1" class="form-label">Nama Instansi</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Nama Instansi" name="nama_instansi" value="{{ $i->nama_instansi }}">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputPassword1" class="form-label">NPSN</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="NPSN" name="npsn" value="{{ $i->npsn }}">
                                    </div>
                                    <div class="mb-3">
                                      <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="jenis_sekolah" id="radioInline" {{ $i->jenis_sekolah === "negeri" ? "checked" : "" }} value="negeri">
                                        <label class="form-check-label" for="radioInline">
                                          Negeri
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="jenis_sekolah" id="radioInline1" {{ $i->jenis_sekolah === "swasta" ? "checked" : "" }} value="swasta">
                                        <label class="form-check-label" for="radioInline1">
                                          Swasta
                                        </label>
                                      </div>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                      <textarea class="form-control" name="alamat"id="exampleFormControlTextarea1" rows="5">{{ $i->alamat }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputPassword1" class="form-label">Telepon</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Telepon" name="telepon" value="{{ $i->telepon }}">
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
    <form class="forms-sample" action="/admin/instansi" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
              <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username" name="username">
              </div>
              <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Password" name="password">
              </div>
              <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Email" name="email">
              </div>
              <hr>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Instansi</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Nama Instansi" name="nama_instansi">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">NPSN</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="NPSN" name="npsn">
              </div>
              <div class="mb-3">
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="jenis_sekolah" id="radioInline">
                  <label class="form-check-label" for="radioInline">
                    Negeri
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="jenis_sekolah" id="radioInline1">
                  <label class="form-check-label" for="radioInline1">
                    Swasta
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat"id="exampleFormControlTextarea1" rows="5"></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Telepon" name="telepon">
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