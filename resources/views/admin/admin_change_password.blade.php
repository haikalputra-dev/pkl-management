@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">

                        <div>
                            <img class="wd-70 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo ): url('upload/no_image.jpg' ) }}" alt="profile">
                            <span class="h4 ms-3">{{ ($profileData->username) }}</span>
                        </div>

                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name</label>
                        <p class="text-muted">{{ ($profileData->name) }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ ($profileData->email) }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{ ($profileData->phone) }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                        <p class="text-muted">{{ ($profileData->address) }}</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->

        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Change Password</h6>

                        <form method="POST" action="{{route('admin.update.password')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">old password</label>
                                <input type="password" name="Old_password" class="form-control @error('Old_password') is-invalid @enderror" id="Old_password" autocomplete="off" value="{{$profileData->username}}">
                                @error('Old_password')
                                <span class="text-danger">{{ massage}}</span>

                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">new password</label>
                                <input type="password" name="New_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">
                                @error('new_password')
                                <span class="text-danger">{{ massage}}</span>

                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Confrim new password</label>
                                <input type="password" name="confirm_new_password" class="form-control" id="confirm_new_password" autocomplete="off">
                                @error('confirm_new_password')
                                <span class="text-danger">{{ $massage}}</span>

                                @enderror
                            </div>



                            <button type="submit" class="btn btn-primary me-2">save change</button>

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










@endsection