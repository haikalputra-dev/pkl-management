  @extends('admin.admin_dashboard')
  @section('admin')
  @include('sweetalert::alert')
<div class="page-content">

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Tim PKL </h6>
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
                  <th>Nama Instansi</th>
                  <th>Nama Pembimbing</th>
                  <th>Nama Siswa</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($resultData as $i)
                {{-- @dd($i) --}}
                <tr>
                  <td>{{ $i['id'] }}</td>
                  <td>{{ implode(', ', $i['nama_instansi']) }}</td>
                  <td>{{ implode(', ', $i['nama_pembimbing']) }}</td>
                  <td>{{ implode(', ', $i['nama_siswa']) }}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                      <button type="button" class="btn btn-warning btn-icon user_edit">
                        <a href="" id="editInstansi" data-bs-toggle="modal" data-bs-target="#editModal-{{ $i['id'] }}" data-id="{{ $i['id'] }}" style="color: black"><i class="btn-icon-prepend" data-feather="edit"></i></a>
                      </button>
                      <a href="{{ route('deleteTim',$i['id']) }}" data-confirm-delete="true" class="btn btn-danger btn-icon"><i class="btn-icon-prepend" data-confirm-delete="true" data-feather="trash-2" ></i></a>
                      <!-- Modal -->
                        <div class="modal fade" id="editModal-{{ $i['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                              </div>
                              <div class="modal-body">
                                <form class="forms-sample" action="/admin/user/{{ $i['id'] }}" method="POST">
                                    @csrf
                                    @method('PUT')
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
    <form class="forms-sample" action="/admin/tim" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="instansi-dropdown" class="form-label">Instansi</label>
          <select class="form-select" id="instansi-dropdown" name="id_instansi">
            <option value="" selected disabled>---PILIH INSTANSI---</option>
            @foreach ($instansi as $u)
            <option value="{{ $u->id }}">{{ $u->nama_instansi }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
            <label for="pembimbing-dropdown" class="form-label">Pembimbing</label>
            <select class="form-select" id="pembimbing-dropdown" name="id_pembimbing">
            </select>
          </div>
          <div class="mb-3">
            <label for="siswa-dropdown" class="form-label">Siswa</label>
            <select class="form-select" id="siswa-dropdown1" name="id_siswa[]">
            </select>
          </div>
          <button type="button" id="cloneSelect" class="btn btn-info">Tambah Siswa</button>
          <button type="button" id="cloneSelectRemove" class="btn btn-warning">-</button>
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