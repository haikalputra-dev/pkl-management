@extends('user.user_dashboard')
@section('user')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                    <div class="webcame-capture"></div>

                </div>
                <button id="takeabsen" class="btn btn-primary">Absen</button>

            </div>
        </div>
    </div>
</div>
</div>
<script language="JavaScript">
    Webcam.set({
        width: 640,
        height: 480,
        image_format: 'jpeg',
        jpeg_quality: 80
    });

    Webcam.attach('.webcame-capture');

    $("#takeabsen").click(function(e) {
        Webcam.snap(function(uri) {
            image = uri;
        });
        $.ajax({
            type: 'POST',
            url: '/presensi/store',
            data: {
                _token: "{{ csrf_token() }}",
                image: image,
            },
            cache: false,
            success: function(respond) {
                if (respond == 0) {
                    Swal.fire({
                        title: "Absensi Success!",
                        text: "You clicked the button!",
                        icon: "success"
                    });
                    setTimeout("location.href='/dashboard'",3000);
                } else {
                    Swal.fire({
                        title: "Erorr!",
                        text: "You clicked the button!",
                        icon: "error"
                    });
                }
            }
        })
    });
</script>


@endsection
