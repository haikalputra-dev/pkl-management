@extends('user.user_dashboard')
@section('user')

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

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>
                                <tr>
                                    <th>file</th>

                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            @foreach ($datajurnal as  $j)


                            <tbody>
                            <th>
                                <a href="{{ URL::asset("uploads/$j->file_name") }}" download>{{ $j->file_name }}</a>
                            </th>

                                    <th>{{ $j->keterangan }}</th>


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
