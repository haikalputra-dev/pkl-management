@extends('mentor.mentor_dashboard')
@section('Mentor')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Table</li>
            </ol>
        </nav>

        <form action="{{ route('mentor.jurnalpost') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="formFile">File upload</label>
                <input class="form-control" name="file_name" type="file" id="formFile">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>

            <button class="btn btn-primary" type="submit">Submit form</button>

        </form>
    </div>





@endsection
