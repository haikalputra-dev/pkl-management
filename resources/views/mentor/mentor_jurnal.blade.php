@extends('mentor.mentor_dashboard')
@section('Mentor')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Materi</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>

            <!-- Button trigger modal -->
            <a href="{{ route('create.materi') }}"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Buat Materi
            </button></a>

            <!-- Modal -->


        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Table Absensi</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>File</th>

                                    <th>Keterangan</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datajurnal as $j)
                                <tr>
                                    <td>{{ $j->file_name }}</td>

                                    <td>{{ $j->keterangan }}</td>

                                </tr>


                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>








@endsection
