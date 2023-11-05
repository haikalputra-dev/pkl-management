@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Data Table</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>

            <a href="{{route('admin.create.data')}}"><button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Create Data
                </button></a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
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
                                    <td>{{$i->address}}</td>
                                    <td>
                                        <a href="{{route('admin.edit.data')}}">
                                            <div class="col-sm-6 col-md-4 col-lg-3"> <i data-feather="edit"></i> edit </div>
                                        </a>
                                        <form action="{{route('admin.delete.user'),$i->id}}" method="delete">

                                            @csrf


                                            <div class="col-sm-6 col-md-4 col-lg-3"> <i data-feather="trash-2"></i> delete </div>

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