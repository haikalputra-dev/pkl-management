<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Admin Panel - Management Magang</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('../assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('../assets/vendors/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('../assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('../assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('../assets/images/favicon.png') }}" />

    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> -->
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.body.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.body.header')
            <!-- partial -->

            @yield('admin')

            <!-- partial:partials/_footer.html -->
            @include('admin.body.footer')
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="{{asset('../assets/vendors/core/core.js')}}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{asset('../assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('../assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('../assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{asset('../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{asset('../assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{asset('../assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('../assets/js/template.js')}}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{asset('../assets/js/dashboard-dark.js')}}"></script>
    <script src="{{asset('../assets/js/data-table.js') }}"></script>
    <script src="{{asset('../assets/js/sweet-alert.js')}}"></script>
    <script src="{{asset('../assets/js/flatpickr.js') }}"></script>
    <!-- End custom js for t    his page -->

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script> -->
    <script>
        $(document).ready(function () {

            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#instansi-dropdown').on('change', function () {
  
                var id_instansi = this.value;
                $("#pembimbing-dropdown").html('');
                $.ajax({
                    url: "{{url('admin/tim/get-pembimbing')}}" +'/'+id_instansi,
                    type: "GET",    
                    dataType: 'json',
                    success: function (result) {
                        $('#pembimbing-dropdown').html('<option value="">-- Select Pembimbing --</option>');
                        $.each(result.pembimbing, function (key, value) {
                            $("#pembimbing-dropdown").append('<option value="' + value
                                .id + '">' + value.nama_pembimbing + '</option>');
                        });
                        $('#siswa-dropdown').html('<option value="">-- Select Siswa --</option>');
                        $.each(result.siswa, function (key, value) {
                            $("#siswa-dropdown").append('<option value="' + value
                                .id + '">' + value.nama_siswa + '</option>');
                        });
                    }
                });
            });
            $('#resetDropdown').on('click', function() {
                $('#siswa-dropdown:not(:first)').remove();
            });
        });
      </script>
      <script>
        $(document).ready(function() {
            // Event listener for the "Add Dropdown" button
            $('#addDropdown').on('click', function() {
                // Clone the first dropdown container
                var clonedDropdown = $('#siswa-dropdown:first').clone();

                // Exclude the selected option from the cloned dropdown
                // var selectedOptionValue = originalDropdown.find('select').val();
                // clonedDropdown.find('option[value="' + selectedOptionValue + '"]').remove();

                // Append the cloned dropdown to the container
                $('#siswa-dropdown:last').after(clonedDropdown);
            });
    
            // Event listener for the "Remove Dropdown" button (optional)
            $(document).on('click', '.removeDropdown', function() {
                // Remove the clicked dropdown container
                $(this).closest('#siswa-dropdown').remove();
            });
        });
    </script>
</body>

</html>