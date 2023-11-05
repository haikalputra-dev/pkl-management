@extends('mentor.mentor_dashboard')
@section('Mentor')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <div class="row profile-body">
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->

        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Buat Absensi</h6>

                        <form method="POST" action="{{route('mentor.create.absensi')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Nama Absensi</label>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$absensi->username}}">
                            </div>

                            <div class="col">
                                <label for="defaultconfig-4" class="col-form-label">Keterangan</label>
                            </div>
                            <div class="col mb-3">
                                <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars."></textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Waktu Absen Masuk:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Batas Waktu Absen Masuk:</label>
                                    <input class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="hh:mm tt" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Waktu Absen Pulang:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Batas Waktu Absen Pulang:</label>
                                    <input class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="hh:mm tt" />
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Simpan </button>
                            <a href="{{route('mentor.absensi')}}"><button type="button" class="btn btn-danger me-2">Batal </button>
                            </a>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- middle wrapper end -->
<!-- right wrapper start -->
<!-- right wrapper end -->
</div>

</div>

<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>







@endsection