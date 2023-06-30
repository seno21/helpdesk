<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/css/dataTables.dataTables.min.css') }}">
    {{-- Untuk komponen button datatble CSS --}}
    <link rel="stylesheet" href="{{ asset('Buttons/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- Trix Editro --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('summernote/summernote.min.css') }}">
    {{-- My css for stepper --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>

<body>
    <div class="container-scroller">
        @include('partials/navbar')
        <div class="container-fluid page-body-wrapper">
            {{-- 
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
     --}}

            @include('partials/sidebar')
            <div class="main-panel">
                {{-- Content --}}
                @yield('content')
                {{-- End Content --}}

                @include('partials/footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('sweetalert::alert')
    <script src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('fontawesome-free/js/all.min.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
    <script src="{{ asset('DataTables/js/dataTables.dataTables.min.js') }}"></script>
    {{-- Untuk komponen button datatble --}}
    <script src="{{ asset('Buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('Buttons/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('JSZip/jszip.min.js') }}"></script>
    <script src="{{ asset('pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('Buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('Buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('Buttons/js/buttons.colVis.min.js') }}"></script>
    {{-- Summernote --}}
    <script type="text/javascript" src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>

    {{-- Script untuk Alert hapus dan datatbles --}}
    <script>
        $(document).on('click', '#btnDelete', function(e) {
            e.preventDefault();
            let form = $(this).parents('form');

            Swal.fire({
                title: 'Yakin menghapus ini ?',
                text: "Data tidak bisa di kembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1BCFB4',
                cancelButtonColor: '#FE7C96',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                    //Disini bisa di masukan swal (sweetalert2)
                } else {
                    Swal.close()
                }

            })
        })

        // $('#kategori').select2()


        $('#DataTables').DataTable({
            dom: 'Bfrtip',
            // buttons: ['excel', 'pdf', 'print']
            buttons: [{
                    extend: 'excel',
                    text: '<i class="fa-solid fa-file-excel"></i>',
                    className: 'btn btn-sm btn-success',
                    exportOptions: {
                        // columns: [0, 1, 2] // Kolom yang akan diekspor
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fa-solid fa-file-pdf"></i>',
                    className: 'btn btn-danger btn-sm',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fa-solid fa-print"></i>',
                    className: 'btn btn-sm btn-secondary',
                    exportOptions: {
                        columns: ':visible' // Semua kolom yang terlihat akan diekspor
                    }
                }
            ]
        });


        $('#deskripsi').summernote({
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen']],
            ],
            height: 120
        });
    </script>

</body>

</html>
