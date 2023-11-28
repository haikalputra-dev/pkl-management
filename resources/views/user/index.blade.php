@extends('user.user_dashboard')
@section('user')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">njing</a></li>
            <li class="breadcrumb-item active" aria-current="page">Feather Icons</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Feather Icons</h6>
                    <p class="text-muted mb-3">Visit the <a href="https://feathericons.com/" target="_blank"> Official Feather Icons Documentation </a>.</p>
                    <p class="text-muted mb-3">Usage example : &lt;i data-feather="star"&gt;&lt;/i&gt;</p>
                    <div class="container">
                        <form method="POST" action="{{ route('webcam.capture') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="my_camera"></div>
                                    <br />
                                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                    <input type="hidden" name="image" class="image-tag">
                                </div>
                                <div class="col-md-6">
                                    <div id="results">Your captured image will appear here...</div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <br />
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <script language="JavaScript">
                        Webcam.set({
                            width: 490,
                            height: 350,
                            image_format: 'jpeg',
                            jpeg_quality: 90
                        });

                        Webcam.attach('#my_camera');

                        function take_snapshot() {
                            Webcam.snap(function(data_uri) {
                                $(".image-tag").val(data_uri);
                                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection