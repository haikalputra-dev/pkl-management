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
          <h6 class="card-title">Data Table</h6>
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
                  <th>NIS</th>
                  <th>Username</th>
                  <th>Nama Siswa</th>
                  <th>Instansi</th>
                  <th>Jurusan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($siswa as $i)  
                <tr>
                  <td>{{ $i->id }}</td>
                  <td>{{ $i->nis }}</td>
                  <td>{{ $i->username }}</td>
                  <td>{{ $i->nama_siswa }}</td>
                  <td>{{ $i->nama_instansi }}</td>
                  <td>{{ $i->jurusan }}</td>
                  <td>
                    <form action="{{ route('deleteInstansi',$i->id) }}" method="POST">
                      @csrf
                      @method('delete')
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-warning btn-icon user_edit"><a href="{{ route('admin.editInstansi', $i->id) }}" style="color: black"><i class="btn-icon-prepend" data-feather="edit"></a></i></button>
                      <button type="submit" class="btn btn-danger btn-icon"><i class="btn-icon-prepend" data-feather="trash-2"></i></button>
                    </div>
      </form>
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
    <form class="forms-sample" action="/admin/siswa" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">NIS</label>
              <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="NIS" name="nis">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Username</label>
                <select class="form-select" id="exampleFormControlSelect1" name="id_auth">
                  <option value="" selected disabled>---PILIH USER---</option>
                  @foreach ($user as $u)
                  @if(is_null($u->id_auth))
                  <option value="{{ $u->id }}">{{ $u->username }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Instansi</label>
                <select class="form-select" id="exampleFormControlSelect1" name="id_instansi">
                  <option value="" selected disabled>---PILIH INSTANSI---</option>
                  @foreach ($instansi as $u)
                  <option value="{{ $u->id }}">{{ $u->nama_instansi }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Nama Siswa" name="nama_siswa">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Jurusan" name="jurusan">
              </div>
              <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                {{-- <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" inputmode="numeric" name="tgl_lahir"> --}}
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
                <label for="exampleFormControlSelect1" class="form-label">Agama</label>
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