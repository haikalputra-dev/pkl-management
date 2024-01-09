@extends('user.user_dashboard')
@section('user')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<style>
    .webcame-capture,
    .webcame-capture video {
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
    }
</style>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Feather Icons</li>
        </ol>
    </nav>


    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Feather Icons</h6>
                    @if($cek > 0)

                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Terimakash</h5>
                            <p class="card-text mb-3">Anda telah absen hari ini</p>
                        </div>
                    </div>


                    @else
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Absensi</h5>
                            <p class="card-text mb-3">Anda belom absensi hari ini.</p>
                            <a href="{{route('user.Presensi')}}" class="btn btn-primary">Silahkan silahkan Absensi</a>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
