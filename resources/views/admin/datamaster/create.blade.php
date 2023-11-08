@extends('admin.admin_dashboard')
@section('admin')


<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <div class="row profile-body">
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->

        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update profile</h6>


                        <form method="POST" action="{{route('admin.data.store')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" id="name" autocomplete="off" value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{old('username')}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{old('password')}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">email</label>
                                <input type="email" name="email" class="form-control" id="email" autocomplete="off" value="{{old('email')}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">address</label>
                                <input type="text" name="address" class="form-control" id="address" autocomplete="off" value="{{old('address')}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" value="{{old('phone')}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">role</label>
                                <input type="text" name="role" class="form-control" id="role" autocomplete="off" value="{{old('role')}}">
                            </div>






                            <button type="submit" class="btn btn-primary me-2">Simpan </button>
                            <a href="{{route('admin.DataMaster')}}"><button type="button" class="btn btn-danger me-2">Batal </button>
                            </a>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</div>

</div>











@endsection