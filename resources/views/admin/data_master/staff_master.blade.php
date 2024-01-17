  @extends('admin.admin_dashboard')
  @section('admin')
  @include('sweetalert::alert')
<div class="page-content">

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Staff</h6>
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
                  <th>Nama Staff</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($staff as $i)  
                <tr>
                  <td>{{ $i->id }}</td>
                  <td>{{ $i->username }}</td>
                  <td>{{ $i->nama_staff }}</td>
                  <td>{{ $i->jenis_kelamin }}</td>
                  <td>{{ $i->alamat }}</td>
                  <td>{{ $i->no_telp }}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                      <button type="button" class="btn btn-warning btn-icon user_edit">
                        <a href="" id="editInstansi" data-bs-toggle="modal" data-bs-target="#editModal-{{ $i->id }}" data-id="{{ $i->id }}" style="color: black"><i class="btn-icon-prepend" data-feather="edit"></i></a>
                      </button>
                      <a href="{{ route('deleteStaff',$i->id) }}" data-confirm-delete="true" class="btn btn-danger btn-icon"><i class="btn-icon-prepend" data-confirm-delete="true" data-feather="trash-2"></i></a>
                      <!-- Modal -->
                        <div class="modal fade" id="editModal-{{ $i->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                              </div>
                              <div class="modal-body">
                                <form class="forms-sample" action="/admin/staff/{{ $i->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                      <label for="exampleInputPassword1" class="form-label">Nama Staff</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Nama Instansi" name="nama_staff" value="{{ $i->nama_staff }}">
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">Tanggal Lahir</label>
                                      <div class="input-group flatpickr" id="flatpickr-date">
                                        <input type="text" class="form-control flatpickr-input" placeholder="Select date" data-input="" readonly="readonly" name="tgl_lahir" value="{{ $i->tgl_lahir }}">
                                        <span class="input-group-text input-group-addon" data-toggle=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                      </div>
                                    </div>
                                    <div class="mb-3">
                                      <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="gender" id="radioInline" {{ $i->jenis_kelamin === "pria" ? "checked" : "" }} value="pria">
                                        <label class="form-check-label" for="radioInline">
                                          Pria
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="gender" id="radioInline1" {{ $i->jenis_kelamin === "wanita" ? "checked" : "" }} value="wanita">
                                        <label class="form-check-label" for="radioInline1">
                                          Wanita
                                        </label>
                                      </div>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleFormControlSelect1" class="form-label">Agama</label>
                                      <select class="form-select" id="exampleFormControlSelect1" name="agama">
                                        <option value="" disabled>---AGAMA---</option>
                                        <option value="islam" {{ $i->agama === "islam" ? "selected" : "" }}>Islam</option>
                                        <option value="kristen" {{ $i->agama === "kristen" ? "selected" : "" }}>Kristen</option>
                                        <option value="hindu" {{ $i->agama === "hindu" ? "selected" : "" }}>Hindu</option>
                                        <option value="buddha" {{ $i->agama === "buddha" ? "selected" : "" }}>Buddha</option>
                                        <option value="kong hu cu" {{ $i->agama === "kong hu cu" ? "selected" : "" }}>Kong Hu Cu</option>
                                        <option value="lainnya" {{ $i->agama === "lainnya" ? "selected" : "" }}>Lainnya</option>
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputPassword1" class="form-label">Telepon</label>
                                      <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Telepon" name="telepon" value="{{ $i->no_telp }}">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                      <textarea class="form-control" name="alamat"id="exampleFormControlTextarea1" rows="5">{{ $i->alamat }}</textarea>
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
    <form class="forms-sample" action="/admin/staff" method="POST">
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
                <label for="exampleInputPassword1" class="form-label">Nama Staff</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Nama Staff" name="nama_staff">
              </div>
              <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <div class="input-group flatpickr" id="flatpickr-date">
                  <input type="text" class="form-control flatpickr-input" placeholder="Select date" data-input="" readonly="readonly" name="tgl_lahir">
                  <span class="input-group-text input-group-addon" data-toggle=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" id="radioInline" value="pria">
                  <label class="form-check-label" for="radioInline">
                    Pria
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" id="radioInline1" value="wanita">
                  <label class="form-check-label" for="radioInline1">
                    Wanita
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Instansi</label>
                <select class="form-select" id="exampleFormControlSelect1" name="agama">
                  <option value="" selected disabled>---AGAMA---</option>
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                  <option value="hindu">Hindu</option>
                  <option value="buddha">Buddha</option>
                  <option value="kong hu cu">Kong Hu Cu</option>
                  <option value="lainnya">Lainnya</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Telepon" name="telepon">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat"id="exampleFormControlTextarea1" rows="5"></textarea>
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