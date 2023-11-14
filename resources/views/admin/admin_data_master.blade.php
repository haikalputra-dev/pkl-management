@extends('admin.admin_dashboard')
@section('admin')
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
                    <th>Name</th>
                    <th>Username</th>
                    <th>Address</th>
                    <th>phone</th>
                    <th>Role</th>
                    <th>status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $i)
                <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->username}}</td>
                    <td>{{$i->address}}</td>
                    <td>{{$i->phone}}</td>
                    <td>{{$i->role}}</td>
                    <td>{{$i->status}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-icon user_edit"><a href="{{route('admin.edit.data')}}" style="color: black"><i class="btn-icon-prepend" data-feather="edit"></a></i></button>
                        <form action="{{route('admin.delete.user'),$i->id}}" method="delete">
              
                            @csrf
              
                            <button type="submit" class="btn btn-danger btn-icon"><i class="btn-icon-prepend" data-feather="trash-2"></i></button>
              
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
  <form class="forms-sample" action="{{ route('insertInstansi') }}" method="POST">
    @csrf
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
    </div>
    <div class="modal-body">
      <div class="card">
        <div class="card-body">

          <h6 class="card-title">Instansi</h6>

          
            <div class="mb-3">
              <label for="exampleInputUsername1" class="form-label">Username</label>
              <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username" name="id_user">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nama Instansi</label>
              <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Nama Instansi" name="nama">
            </div>
          

        </div>
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