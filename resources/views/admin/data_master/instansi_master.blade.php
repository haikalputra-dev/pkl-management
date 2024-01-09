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
                  <th>Username</th>
                  <th>Email</th>
                  <th>Nama Instansi</th>
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
                  <td>
                    <form action="{{ route('deleteInstansi',$i->id) }}" method="POST">
                      @csrf
                      @method('delete')
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-warning btn-icon user_edit"><a href="{{ route('admin.editInstansi', $i->id) }}" style="color: black"><i class="btn-icon-prepend" data-feather="edit"></a></i></button>
                      <button type="submit" class="btn btn-danger btn-icon"><i class="btn-icon-prepend" data-feather="trash-2"></i></button>
                    </div>

                    
                    {{-- <button class="btn btn-primary" onclick="showSwal('delete-confirm')">Click here!</button> --}}
                  <!-- Small modal -->
                      {{-- <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $i->id }}"><i class="btn-icon-prepend" data-feather="trash-2"></i></button>
      <form action="{{ route('deleteInstansi',$i->id) }}" method="POST">
        @csrf
        @method('delete')
        <!-- Modal -->
        <div class="modal fade" id="deleteModal{{ $i->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
              </div>
              <div class="modal-body">
                {{ $i->id }}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div> --}}
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
    <form class="forms-sample" action="/admin/instansi" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">            
              {{-- <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username" name="id_user">
              </div> --}}
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

{{-- <script>
  $(function() {

showSwal = function(type) {
}
'use strict';
    if (type === 'delete-confirm') {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger me-2'
        },
        buttonsStyling: false,
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Yakin Hapus?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'me-2',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        } else if (
          // Read more about handling dismissals
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
    }
});
</script> --}}
@endsection