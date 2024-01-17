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
                        <a href="{{ route('create.jurnal') }}"><button type="button" class="btn btn-primary" >
                            Buat Materi
                        </button></a>

                        <!-- Modal -->

                        <h6 class="card-title">Data Table</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">

                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Nama</th>
                                        <th>keterangan</th>

                                    </tr>
                                </thead>
                                @foreach ($datajurnal as $j)


                                <tbody>
                                    <th>
                                        <a href="{{ URL::asset("uploads/$j->foto_jr") }}" download>{{ $j->foto_jr }}</a>
    
                                    </th>
                                    <th>{{ $j->name }}</th>
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
